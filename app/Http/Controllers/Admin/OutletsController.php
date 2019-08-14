<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyOutletRequest;
use App\Http\Requests\StoreOutletRequest;
use App\Http\Requests\UpdateOutletRequest;
use App\Outlet;
use App\Role;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OutletsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Outlet::query()->select('*');
            $query->with(['owner_user', 'heineken_rep_user', 'css_user', 'csr_user', 'field_ops_user']);
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'outlet_show';
                $editGate      = 'outlet_edit';
                $deleteGate    = 'outlet_delete';
                $crudRoutePart = 'outlets';

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
            $table->editColumn('id_external', function ($row) {
                return $row->id_external ? $row->id_external : "";
            });
            $table->editColumn('sitecode', function ($row) {
                return $row->sitecode ? $row->sitecode : "";
            });
            $table->editColumn('site_name', function ($row) {
                return $row->site_name ? $row->site_name : "";
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? Outlet::STATUS_SELECT[$row->status] : '';
            });
            $table->editColumn('w_3_w', function ($row) {
                return $row->w_3_w ? $row->w_3_w : "";
            });
            $table->editColumn('area', function ($row) {
                return $row->area ? Outlet::AREA_SELECT[$row->area] : '';
            });
            $table->editColumn('province', function ($row) {
                return $row->province ? Outlet::PROVINCE_SELECT[$row->province] : '';
            });
            $table->editColumn('user.owner_user', function ($row) {
                return $row->owner_user ? (is_string($row->owner_user) ? $row->owner_user : $row->owner_user->name) : '';
            });
            $table->editColumn('owner_user.email', function ($row) {
                return $row->owner_user ? (is_string($row->owner_user) ? $row->owner_user : $row->owner_user->email) : '';
            });
            $table->editColumn('owner_user.mobile', function ($row) {
                return $row->owner_user ? (is_string($row->owner_user) ? $row->owner_user : $row->owner_user->mobile) : '';
            });
            $table->editColumn('user.heineken_rep_user', function ($row) {
                return $row->heineken_rep_user ? (is_string($row->heineken_rep_user) ? $row->heineken_rep_user : $row->heineken_rep_user->name) : '';
            });
            $table->editColumn('heineken_rep_user.mobile', function ($row) {
                return $row->heineken_rep_user ? (is_string($row->heineken_rep_user) ? $row->heineken_rep_user : $row->heineken_rep_user->mobile) : '';
            });
            $table->editColumn('user.css_user', function ($row) {
                return $row->css_user ? (is_string($row->css_user) ? $row->css_user : $row->css_user->name) : '';
            });
            $table->editColumn('css_user.email', function ($row) {
                return $row->css_user ? (is_string($row->css_user) ? $row->css_user : $row->css_user->email) : '';
            });
            $table->editColumn('css_user.code', function ($row) {
                return $row->css_user ? (is_string($row->css_user) ? $row->css_user : $row->css_user->code) : '';
            });
            $table->editColumn('css_user.mobile', function ($row) {
                return $row->css_user ? (is_string($row->css_user) ? $row->css_user : $row->css_user->mobile) : '';
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
            $table->editColumn('user.field_ops_user', function ($row) {
                return $row->field_ops_user ? (is_string($row->field_ops_user) ? $row->field_ops_user : $row->field_ops_user->name) : '';
            });
            $table->editColumn('field_ops_user.email', function ($row) {
                return $row->field_ops_user ? (is_string($row->field_ops_user) ? $row->field_ops_user : $row->field_ops_user->email) : '';
            });
            $table->editColumn('field_ops_user.code', function ($row) {
                return $row->field_ops_user ? (is_string($row->field_ops_user) ? $row->field_ops_user : $row->field_ops_user->code) : '';
            });
            $table->editColumn('field_ops_user.mobile', function ($row) {
                return $row->field_ops_user ? (is_string($row->field_ops_user) ? $row->field_ops_user : $row->field_ops_user->mobile) : '';
            });
            $table->rawColumns(['actions', 'placeholder', 'owner_user', 'heineken_rep_user', 'css_user', 'csr_user', 'field_ops_user']);

            return $table->make(true);
        }

        return view('admin.outlets.index');
    }

    public function create()
    {
        abort_if(Gate::denies('outlet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $owner_roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $owner_users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $heineken_rep_roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $heineken_rep_users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $css_roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $css_users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $csr_roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $csr_users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $field_ops_roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $field_ops_users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.outlets.create', compact('owner_roles', 'owner_users', 'heineken_rep_roles', 'heineken_rep_users', 'css_roles', 'css_users', 'csr_roles', 'csr_users', 'field_ops_roles', 'field_ops_users'));
    }

    public function store(StoreOutletRequest $request)
    {
        $outlet = Outlet::create($request->all());

        return redirect()->route('admin.outlets.index');
    }

    public function edit(Outlet $outlet)
    {
        abort_if(Gate::denies('outlet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $owner_roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $owner_users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $heineken_rep_roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $heineken_rep_users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $css_roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $css_users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $csr_roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $csr_users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $field_ops_roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $field_ops_users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $outlet->load('owner_role', 'owner_user', 'heineken_rep_role', 'heineken_rep_user', 'css_role', 'css_user', 'csr_role', 'csr_user', 'field_ops_role', 'field_ops_user');

        return view('admin.outlets.edit', compact('owner_roles', 'owner_users', 'heineken_rep_roles', 'heineken_rep_users', 'css_roles', 'css_users', 'csr_roles', 'csr_users', 'field_ops_roles', 'field_ops_users', 'outlet'));
    }

    public function update(UpdateOutletRequest $request, Outlet $outlet)
    {
        $outlet->update($request->all());

        return redirect()->route('admin.outlets.index');
    }

    public function show(Outlet $outlet)
    {
        abort_if(Gate::denies('outlet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outlet->load('owner_role', 'owner_user', 'heineken_rep_role', 'heineken_rep_user', 'css_role', 'css_user', 'csr_role', 'csr_user', 'field_ops_role', 'field_ops_user');

        return view('admin.outlets.show', compact('outlet'));
    }

    public function destroy(Outlet $outlet)
    {
        abort_if(Gate::denies('outlet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outlet->delete();

        return back();
    }

    public function massDestroy(MassDestroyOutletRequest $request)
    {
        Outlet::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
