@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.training.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.id') }}
                        </th>
                        <td>
                            {{ $training->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.outlet') }}
                        </th>
                        <td>
                            {{ $training->outlet->site_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.date') }}
                        </th>
                        <td>
                            {{ $training->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.start_time') }}
                        </th>
                        <td>
                            {{ $training->start_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.end_time') }}
                        </th>
                        <td>
                            {{ $training->end_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Training Modules
                        </th>
                        <td>
                            @foreach($training->training_modules as $id => $training_modules)
                                <span class="label label-info label-many">{{ $training_modules->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.person_trained') }}
                        </th>
                        <td>
                            {{ $training->person_trained }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.feedback') }}
                        </th>
                        <td>
                            {!! $training->feedback !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection