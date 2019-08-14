<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrainingModuleRequest;
use App\Http\Requests\UpdateTrainingModuleRequest;
use App\Http\Resources\Admin\TrainingModuleResource;
use App\TrainingModule;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrainingModulesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('training_module_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrainingModuleResource(TrainingModule::all());
    }

    public function store(StoreTrainingModuleRequest $request)
    {
        $trainingModule = TrainingModule::create($request->all());

        return (new TrainingModuleResource($trainingModule))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TrainingModule $trainingModule)
    {
        abort_if(Gate::denies('training_module_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrainingModuleResource($trainingModule);
    }

    public function update(UpdateTrainingModuleRequest $request, TrainingModule $trainingModule)
    {
        $trainingModule->update($request->all());

        return (new TrainingModuleResource($trainingModule))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TrainingModule $trainingModule)
    {
        abort_if(Gate::denies('training_module_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainingModule->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
