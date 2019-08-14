@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.whyLaggard.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.whyLaggard.fields.id') }}
                        </th>
                        <td>
                            {{ $whyLaggard->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.whyLaggard.fields.title') }}
                        </th>
                        <td>
                            {{ $whyLaggard->title }}
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