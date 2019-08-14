<?php

namespace App\Http\Controllers\Admin;

use App\CallCycle;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCallCycleRequest;
use App\Http\Requests\StoreCallCycleRequest;
use App\Http\Requests\UpdateCallCycleRequest;
use App\Outlet;
use App\Role;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CallCyclesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = CallCycle::query()->select('*');
            $query->with(['outlet', 'csr_role', 'csr_user']);
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'call_cycle_show';
                $editGate      = 'call_cycle_edit';
                $deleteGate    = 'call_cycle_delete';
                $crudRoutePart = 'call-cycles';

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
            $table->editColumn('outlet.status', function ($row) {
                return $row->outlet ? (is_string($row->outlet) ? $row->outlet : $row->outlet->status) : '';
            });
            $table->editColumn('outlet.w_3_w', function ($row) {
                return $row->outlet ? (is_string($row->outlet) ? $row->outlet : $row->outlet->w_3_w) : '';
            });
            $table->editColumn('outlet.area', function ($row) {
                return $row->outlet ? (is_string($row->outlet) ? $row->outlet : $row->outlet->area) : '';
            });
            $table->editColumn('role.csr_role', function ($row) {
                return $row->csr_role ? (is_string($row->csr_role) ? $row->csr_role : $row->csr_role->title) : '';
            });
            $table->editColumn('user.csr_user', function ($row) {
                return $row->csr_user ? (is_string($row->csr_user) ? $row->csr_user : $row->csr_user->name) : '';
            });
            $table->editColumn('csr_user.email', function ($row) {
                return $row->csr_user ? (is_string($row->csr_user) ? $row->csr_user : $row->csr_user->email) : '';
            });
            $table->editColumn('csr_user.code', function ($row) {
                return $row->csr_user ? (is_string($row->csr_user) ? $row->csr_user : $row->csr_user->code) : '';
            });
            $table->editColumn('csr_user.mobile', function ($row) {
                return $row->csr_user ? (is_string($row->csr_user) ? $row->csr_user : $row->csr_user->mobile) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'outlet', 'csr_role', 'csr_user']);

            return $table->make(true);
        }

        return view('admin.callCycles.index');
    }

    public function create()
    {
        abort_if(Gate::denies('call_cycle_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outlets = Outlet::all()->pluck('site_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $csr_roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $csr_users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.callCycles.create', compact('outlets', 'csr_roles', 'csr_users'));
    }

    public function store(StoreCallCycleRequest $request)
    {
        $callCycle = CallCycle::create($request->all());

        return redirect()->route('admin.call-cycles.index');
    }

    public function edit(CallCycle $callCycle)
    {
        abort_if(Gate::denies('call_cycle_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outlets = Outlet::all()->pluck('site_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $csr_roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $csr_users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $callCycle->load('outlet', 'csr_role', 'csr_user');

        return view('admin.callCycles.edit', compact('outlets', 'csr_roles', 'csr_users', 'callCycle'));
    }

    public function update(UpdateCallCycleRequest $request, CallCycle $callCycle)
    {
        $callCycle->update($request->all());

        return redirect()->route('admin.call-cycles.index');
    }

    public function show(CallCycle $callCycle)
    {
        abort_if(Gate::denies('call_cycle_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $callCycle->load('outlet', 'csr_role', 'csr_user');

        return view('admin.callCycles.show', compact('callCycle'));
    }

    public function destroy(CallCycle $callCycle)
    {
        abort_if(Gate::denies('call_cycle_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $callCycle->delete();

        return back();
    }

    public function massDestroy(MassDestroyCallCycleRequest $request)
    {
        CallCycle::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
