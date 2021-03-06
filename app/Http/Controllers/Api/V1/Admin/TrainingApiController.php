<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;
use App\Http\Resources\Admin\TrainingResource;
use App\Training;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrainingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('training_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrainingResource(Training::with(['outlet', 'training_modules'])->get());
    }

    public function store(StoreTrainingRequest $request)
    {
        $training = Training::create($request->all());
        $training->outlet()->sync($request->input('outlet', []));
        $training->training_modules()->sync($request->input('training_modules', []));

        return (new TrainingResource($training))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Training $training)
    {
        abort_if(Gate::denies('training_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrainingResource($training->load(['outlet', 'training_modules']));
    }

    public function update(UpdateTrainingRequest $request, Training $training)
    {
        $training->update($request->all());
        $training->outlet()->sync($request->input('outlet', []));
        $training->training_modules()->sync($request->input('training_modules', []));

        return (new TrainingResource($training))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Training $training)
    {
        abort_if(Gate::denies('training_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $training->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
