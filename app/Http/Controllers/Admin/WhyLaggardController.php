<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWhyLaggardRequest;
use App\Http\Requests\StoreWhyLaggardRequest;
use App\Http\Requests\UpdateWhyLaggardRequest;
use App\WhyLaggard;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class WhyLaggardController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('why_laggard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $whyLaggards = WhyLaggard::all();

        return view('admin.whyLaggards.index', compact('whyLaggards'));
    }

    public function create()
    {
        abort_if(Gate::denies('why_laggard_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.whyLaggards.create');
    }

    public function store(StoreWhyLaggardRequest $request)
    {
        $whyLaggard = WhyLaggard::create($request->all());

        return redirect()->route('admin.why-laggards.index');
    }

    public function edit(WhyLaggard $whyLaggard)
    {
        abort_if(Gate::denies('why_laggard_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.whyLaggards.edit', compact('whyLaggard'));
    }

    public function update(UpdateWhyLaggardRequest $request, WhyLaggard $whyLaggard)
    {
        $whyLaggard->update($request->all());

        return redirect()->route('admin.why-laggards.index');
    }

    public function show(WhyLaggard $whyLaggard)
    {
        abort_if(Gate::denies('why_laggard_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.whyLaggards.show', compact('whyLaggard'));
    }

    public function destroy(WhyLaggard $whyLaggard)
    {
        abort_if(Gate::denies('why_laggard_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $whyLaggard->delete();

        return back();
    }

    public function massDestroy(MassDestroyWhyLaggardRequest $request)
    {
        WhyLaggard::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
