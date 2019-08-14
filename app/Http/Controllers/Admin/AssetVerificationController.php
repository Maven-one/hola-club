<?php

namespace App\Http\Controllers\Admin;

use App\AssetVerification;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAssetVerificationRequest;
use App\Http\Requests\StoreAssetVerificationRequest;
use App\Http\Requests\UpdateAssetVerificationRequest;
use App\Outlet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AssetVerificationController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = AssetVerification::query()->select('*');
            $query->with(['outlet']);
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'asset_verification_show';
                $editGate      = 'asset_verification_edit';
                $deleteGate    = 'asset_verification_delete';
                $crudRoutePart = 'asset-verifications';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });
            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });

            $table->editColumn('start_time', function ($row) {
                return $row->start_time ? $row->start_time : "";
            });
            $table->editColumn('end_time', function ($row) {
                return $row->end_time ? $row->end_time : "";
            });
            $table->editColumn('t_1_mini_1', function ($row) {
                return $row->t_1_mini_1 ? $row->t_1_mini_1 : "";
            });
            $table->editColumn('t_1_mini_2', function ($row) {
                return $row->t_1_mini_2 ? $row->t_1_mini_2 : "";
            });
            $table->editColumn('till_drawer', function ($row) {
                return $row->till_drawer ? $row->till_drawer : "";
            });
            $table->editColumn('scanner', function ($row) {
                return $row->scanner ? $row->scanner : "";
            });
            $table->editColumn('ups', function ($row) {
                return $row->ups ? $row->ups : "";
            });
            $table->editColumn('outlet.outlet', function ($row) {
                return $row->outlet ? (is_string($row->outlet) ? $row->outlet : $row->outlet->site_name) : '';
            });
            $table->editColumn('outlet.id_external', function ($row) {
                return $row->outlet ? (is_string($row->outlet) ? $row->outlet : $row->outlet->id_external) : '';
            });
            $table->editColumn('outlet.sitecode', function ($row) {
                return $row->outlet ? (is_string($row->outlet) ? $row->outlet : $row->outlet->sitecode) : '';
            });
            $table->rawColumns(['actions', 'placeholder', 'outlet']);

            return $table->make(true);
        }

        return view('admin.assetVerifications.index');
    }

    public function create()
    {
        abort_if(Gate::denies('asset_verification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outlets = Outlet::all()->pluck('site_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.assetVerifications.create', compact('outlets'));
    }

    public function store(StoreAssetVerificationRequest $request)
    {
        $assetVerification = AssetVerification::create($request->all());

        return redirect()->route('admin.asset-verifications.index');
    }

    public function edit(AssetVerification $assetVerification)
    {
        abort_if(Gate::denies('asset_verification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outlets = Outlet::all()->pluck('site_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assetVerification->load('outlet');

        return view('admin.assetVerifications.edit', compact('outlets', 'assetVerification'));
    }

    public function update(UpdateAssetVerificationRequest $request, AssetVerification $assetVerification)
    {
        $assetVerification->update($request->all());

        return redirect()->route('admin.asset-verifications.index');
    }

    public function show(AssetVerification $assetVerification)
    {
        abort_if(Gate::denies('asset_verification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetVerification->load('outlet');

        return view('admin.assetVerifications.show', compact('assetVerification'));
    }

    public function destroy(AssetVerification $assetVerification)
    {
        abort_if(Gate::denies('asset_verification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetVerification->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssetVerificationRequest $request)
    {
        AssetVerification::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
