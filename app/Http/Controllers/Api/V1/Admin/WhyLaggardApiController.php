<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWhyLaggardRequest;
use App\Http\Requests\UpdateWhyLaggardRequest;
use App\Http\Resources\Admin\WhyLaggardResource;
use App\WhyLaggard;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WhyLaggardApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('why_laggard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WhyLaggardResource(WhyLaggard::all());
    }

    public function store(StoreWhyLaggardRequest $request)
    {
        $whyLaggard = WhyLaggard::create($request->all());

        return (new WhyLaggardResource($whyLaggard))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(WhyLaggard $whyLaggard)
    {
        abort_if(Gate::denies('why_laggard_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WhyLaggardResource($whyLaggard);
    }

    public function update(UpdateWhyLaggardRequest $request, WhyLaggard $whyLaggard)
    {
        $whyLaggard->update($request->all());

        return (new WhyLaggardResource($whyLaggard))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(WhyLaggard $whyLaggard)
    {
        abort_if(Gate::denies('why_laggard_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $whyLaggard->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
