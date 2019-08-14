<?php

namespace App\Http\Controllers\Admin;

use App\Audit;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAuditRequest;
use App\Http\Requests\StoreAuditRequest;
use App\Http\Requests\UpdateAuditRequest;
use App\Outlet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AuditController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Audit::query()->select('*');

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'audit_show';
                $editGate      = 'audit_edit';
                $deleteGate    = 'audit_delete';
                $crudRoutePart = 'audits';

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
            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.audits.index');
    }

    public function create()
    {
        abort_if(Gate::denies('audit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outlets = Outlet::all()->pluck('site_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.audits.create', compact('outlets'));
    }

    public function store(StoreAuditRequest $request)
    {
        $audit = Audit::create($request->all());

        return redirect()->route('admin.audits.index');
    }

    public function edit(Audit $audit)
    {
        abort_if(Gate::denies('audit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outlets = Outlet::all()->pluck('site_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $audit->load('outlet');

        return view('admin.audits.edit', compact('outlets', 'audit'));
    }

    public function update(UpdateAuditRequest $request, Audit $audit)
    {
        $audit->update($request->all());

        return redirect()->route('admin.audits.index');
    }

    public function show(Audit $audit)
    {
        abort_if(Gate::denies('audit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $audit->load('outlet');

        return view('admin.audits.show', compact('audit'));
    }

    public function destroy(Audit $audit)
    {
        abort_if(Gate::denies('audit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $audit->delete();

        return back();
    }

    public function massDestroy(MassDestroyAuditRequest $request)
    {
        Audit::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
