<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOutletRequest;
use App\Http\Requests\UpdateOutletRequest;
use App\Http\Resources\Admin\OutletResource;
use App\Outlet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OutletsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('outlet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OutletResource(Outlet::with(['owner_role', 'owner_user', 'heineken_rep_role', 'heineken_rep_user', 'css_role', 'css_user', 'csr_role', 'csr_user', 'field_ops_role', 'field_ops_user'])->get());
    }

    public function store(StoreOutletRequest $request)
    {
        $outlet = Outlet::create($request->all());
        $outlet->owner_role()->sync($request->input('owner_role', []));
        $outlet->owner_user()->sync($request->input('owner_user', []));
        $outlet->heineken_rep_role()->sync($request->input('heineken_rep_role', []));
        $outlet->heineken_rep_user()->sync($request->input('heineken_rep_user', []));
        $outlet->css_role()->sync($request->input('css_role', []));
        $outlet->css_user()->sync($request->input('css_user', []));
        $outlet->csr_role()->sync($request->input('csr_role', []));
        $outlet->csr_user()->sync($request->input('csr_user', []));
        $outlet->field_ops_role()->sync($request->input('field_ops_role', []));
        $outlet->field_ops_user()->sync($request->input('field_ops_user', []));

        return (new OutletResource($outlet))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Outlet $outlet)
    {
        abort_if(Gate::denies('outlet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OutletResource($outlet->load(['owner_role', 'owner_user', 'heineken_rep_role', 'heineken_rep_user', 'css_role', 'css_user', 'csr_role', 'csr_user', 'field_ops_role', 'field_ops_user']));
    }

    public function update(UpdateOutletRequest $request, Outlet $outlet)
    {
        $outlet->update($request->all());
        $outlet->owner_role()->sync($request->input('owner_role', []));
        $outlet->owner_user()->sync($request->input('owner_user', []));
        $outlet->heineken_rep_role()->sync($request->input('heineken_rep_role', []));
        $outlet->heineken_rep_user()->sync($request->input('heineken_rep_user', []));
        $outlet->css_role()->sync($request->input('css_role', []));
        $outlet->css_user()->sync($request->input('css_user', []));
        $outlet->csr_role()->sync($request->input('csr_role', []));
        $outlet->csr_user()->sync($request->input('csr_user', []));
        $outlet->field_ops_role()->sync($request->input('field_ops_role', []));
        $outlet->field_ops_user()->sync($request->input('field_ops_user', []));

        return (new OutletResource($outlet))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Outlet $outlet)
    {
        abort_if(Gate::denies('outlet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outlet->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
