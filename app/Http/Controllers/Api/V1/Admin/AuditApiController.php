<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Audit;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuditRequest;
use App\Http\Requests\UpdateAuditRequest;
use App\Http\Resources\Admin\AuditResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuditApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('audit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AuditResource(Audit::with(['outlet'])->get());
    }

    public function store(StoreAuditRequest $request)
    {
        $audit = Audit::create($request->all());
        $audit->outlet()->sync($request->input('outlet', []));

        return (new AuditResource($audit))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Audit $audit)
    {
        abort_if(Gate::denies('audit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AuditResource($audit->load(['outlet']));
    }

    public function update(UpdateAuditRequest $request, Audit $audit)
    {
        $audit->update($request->all());
        $audit->outlet()->sync($request->input('outlet', []));

        return (new AuditResource($audit))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Audit $audit)
    {
        abort_if(Gate::denies('audit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $audit->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
