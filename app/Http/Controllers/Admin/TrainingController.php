<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTrainingRequest;
use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;
use App\Outlet;
use App\Training;
use App\TrainingModule;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TrainingController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Training::query()->select('*');
            $query->with(['outlet']);
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'training_show';
                $editGate      = 'training_edit';
                $deleteGate    = 'training_delete';
                $crudRoutePart = 'trainings';

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
            $table->editColumn('outlet.site_name', function ($row) {
                return $row->outlet ? (is_string($row->outlet) ? $row->outlet : $row->outlet->site_name) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'outlet']);

            return $table->make(true);
        }

        return view('admin.trainings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('training_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outlets = Outlet::all()->pluck('site_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $training_modules = TrainingModule::all()->pluck('title', 'id');

        return view('admin.trainings.create', compact('outlets', 'training_modules'));
    }

    public function store(StoreTrainingRequest $request)
    {
        $training = Training::create($request->all());
        $training->training_modules()->sync($request->input('training_modules', []));

        return redirect()->route('admin.trainings.index');
    }

    public function edit(Training $training)
    {
        abort_if(Gate::denies('training_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outlets = Outlet::all()->pluck('site_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $training_modules = TrainingModule::all()->pluck('title', 'id');

        $training->load('outlet', 'training_modules');

        return view('admin.trainings.edit', compact('outlets', 'training_modules', 'training'));
    }

    public function update(UpdateTrainingRequest $request, Training $training)
    {
        $training->update($request->all());
        $training->training_modules()->sync($request->input('training_modules', []));

        return redirect()->route('admin.trainings.index');
    }

    public function show(Training $training)
    {
        abort_if(Gate::denies('training_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $training->load('outlet', 'training_modules');

        return view('admin.trainings.show', compact('training'));
    }

    public function destroy(Training $training)
    {
        abort_if(Gate::denies('training_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $training->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrainingRequest $request)
    {
        Training::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
