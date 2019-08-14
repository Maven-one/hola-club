<?php

namespace App\Http\Controllers\Admin;

use App\FieldOpsRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyFieldOpsRequestRequest;
use App\Http\Requests\StoreFieldOpsRequestRequest;
use App\Http\Requests\UpdateFieldOpsRequestRequest;
use App\Outlet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FieldOpsRequestController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = FieldOpsRequest::query()->select('*');
            $query->with(['outlet']);
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'field_ops_request_show';
                $editGate      = 'field_ops_request_edit';
                $deleteGate    = 'field_ops_request_delete';
                $crudRoutePart = 'field-ops-requests';

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
            $table->editColumn('outlet.outlet', function ($row) {
                return $row->outlet ? (is_string($row->outlet) ? $row->outlet : $row->outlet->site_name) : '';
            });
            $table->editColumn('outlet.id_external', function ($row) {
                return $row->outlet ? (is_string($row->outlet) ? $row->outlet : $row->outlet->id_external) : '';
            });
            $table->editColumn('outlet.sitecode', function ($row) {
                return $row->outlet ? (is_string($row->outlet) ? $row->outlet : $row->outlet->sitecode) : '';
            });
            $table->editColumn('device', function ($row) {
                return $row->device ? FieldOpsRequest::DEVICE_SELECT[$row->device] : '';
            });
            $table->editColumn('fault_reason', function ($row) {
                return $row->fault_reason ? FieldOpsRequest::FAULT_REASON_SELECT[$row->fault_reason] : '';
            });
            $table->rawColumns(['actions', 'placeholder', 'outlet']);

            return $table->make(true);
        }

        return view('admin.fieldOpsRequests.index');
    }

    public function create()
    {
        abort_if(Gate::denies('field_ops_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outlets = Outlet::all()->pluck('site_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.fieldOpsRequests.create', compact('outlets'));
    }

    public function store(StoreFieldOpsRequestRequest $request)
    {
        $fieldOpsRequest = FieldOpsRequest::create($request->all());

        return redirect()->route('admin.field-ops-requests.index');
    }

    public function edit(FieldOpsRequest $fieldOpsRequest)
    {
        abort_if(Gate::denies('field_ops_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outlets = Outlet::all()->pluck('site_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fieldOpsRequest->load('outlet');

        return view('admin.fieldOpsRequests.edit', compact('outlets', 'fieldOpsRequest'));
    }

    public function update(UpdateFieldOpsRequestRequest $request, FieldOpsRequest $fieldOpsRequest)
    {
        $fieldOpsRequest->update($request->all());

        return redirect()->route('admin.field-ops-requests.index');
    }

    public function show(FieldOpsRequest $fieldOpsRequest)
    {
        abort_if(Gate::denies('field_ops_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fieldOpsRequest->load('outlet');

        return view('admin.fieldOpsRequests.show', compact('fieldOpsRequest'));
    }

    public function destroy(FieldOpsRequest $fieldOpsRequest)
    {
        abort_if(Gate::denies('field_ops_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fieldOpsRequest->delete();

        return back();
    }

    public function massDestroy(MassDestroyFieldOpsRequestRequest $request)
    {
        FieldOpsRequest::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
