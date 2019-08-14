@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.trainingModule.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.trainingModule.fields.id') }}
                        </th>
                        <td>
                            {{ $trainingModule->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainingModule.fields.title') }}
                        </th>
                        <td>
                            {{ $trainingModule->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainingModule.fields.order') }}
                        </th>
                        <td>
                            {{ $trainingModule->order }}
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