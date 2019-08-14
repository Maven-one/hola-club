<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTrainingModuleRequest;
use App\Http\Requests\StoreTrainingModuleRequest;
use App\Http\Requests\UpdateTrainingModuleRequest;
use App\TrainingModule;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TrainingModulesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = TrainingModule::query()->select('*');

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'training_module_show';
                $editGate      = 'training_module_edit';
                $deleteGate    = 'training_module_delete';
                $crudRoutePart = 'training-modules';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : "";
            });
            $table->editColumn('order', function ($row) {
                return $row->order ? $row->order : "";
            });
            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.trainingModules.index');
    }

    public function create()
    {
        abort_if(Gate::denies('training_module_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trainingModules.create');
    }

    public function store(StoreTrainingModuleRequest $request)
    {
        $trainingModule = TrainingModule::create($request->all());

        return redirect()->route('admin.training-modules.index');
    }

    public function edit(TrainingModule $trainingModule)
    {
        abort_if(Gate::denies('training_module_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trainingModules.edit', compact('trainingModule'));
    }

    public function update(UpdateTrainingModuleRequest $request, TrainingModule $trainingModule)
    {
        $trainingModule->update($request->all());

        return redirect()->route('admin.training-modules.index');
    }

    public function show(TrainingModule $trainingModule)
    {
        abort_if(Gate::denies('training_module_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trainingModules.show', compact('trainingModule'));
    }

    public function destroy(TrainingModule $trainingModule)
    {
        abort_if(Gate::denies('training_module_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainingModule->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrainingModuleRequest $request)
    {
        TrainingModule::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
