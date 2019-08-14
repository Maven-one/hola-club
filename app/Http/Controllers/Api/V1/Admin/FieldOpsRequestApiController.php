<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\FieldOpsRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFieldOpsRequestRequest;
use App\Http\Requests\UpdateFieldOpsRequestRequest;
use App\Http\Resources\Admin\FieldOpsRequestResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FieldOpsRequestApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('field_ops_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FieldOpsRequestResource(FieldOpsRequest::with(['outlet'])->get());
    }

    public function store(StoreFieldOpsRequestRequest $request)
    {
        $fieldOpsRequest = FieldOpsRequest::create($request->all());
        $fieldOpsRequest->outlet()->sync($request->input('outlet', []));

        return (new FieldOpsRequestResource($fieldOpsRequest))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FieldOpsRequest $fieldOpsRequest)
    {
        abort_if(Gate::denies('field_ops_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FieldOpsRequestResource($fieldOpsRequest->load(['outlet']));
    }

    public function update(UpdateFieldOpsRequestRequest $request, FieldOpsRequest $fieldOpsRequest)
    {
        $fieldOpsRequest->update($request->all());
        $fieldOpsRequest->outlet()->sync($request->input('outlet', []));

        return (new FieldOpsRequestResource($fieldOpsRequest))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FieldOpsRequest $fieldOpsRequest)
    {
        abort_if(Gate::denies('field_ops_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fieldOpsRequest->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
