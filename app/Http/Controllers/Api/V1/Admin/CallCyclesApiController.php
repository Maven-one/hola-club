<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CallCycle;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCallCycleRequest;
use App\Http\Requests\UpdateCallCycleRequest;
use App\Http\Resources\Admin\CallCycleResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CallCyclesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('call_cycle_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CallCycleResource(CallCycle::with(['outlet', 'csr_role', 'csr_user'])->get());
    }

    public function store(StoreCallCycleRequest $request)
    {
        $callCycle = CallCycle::create($request->all());
        $callCycle->outlet()->sync($request->input('outlet', []));
        $callCycle->csr_role()->sync($request->input('csr_role', []));
        $callCycle->csr_user()->sync($request->input('csr_user', []));

        return (new CallCycleResource($callCycle))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CallCycle $callCycle)
    {
        abort_if(Gate::denies('call_cycle_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CallCycleResource($callCycle->load(['outlet', 'csr_role', 'csr_user']));
    }

    public function update(UpdateCallCycleRequest $request, CallCycle $callCycle)
    {
        $callCycle->update($request->all());
        $callCycle->outlet()->sync($request->input('outlet', []));
        $callCycle->csr_role()->sync($request->input('csr_role', []));
        $callCycle->csr_user()->sync($request->input('csr_user', []));

        return (new CallCycleResource($callCycle))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CallCycle $callCycle)
    {
        abort_if(Gate::denies('call_cycle_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $callCycle->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
