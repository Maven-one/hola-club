@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.assetVerification.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.assetVerification.fields.id') }}
                        </th>
                        <td>
                            {{ $assetVerification->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetVerification.fields.date') }}
                        </th>
                        <td>
                            {{ $assetVerification->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetVerification.fields.start_time') }}
                        </th>
                        <td>
                            {{ $assetVerification->start_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetVerification.fields.end_time') }}
                        </th>
                        <td>
                            {{ $assetVerification->end_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetVerification.fields.t_1_mini_1') }}
                        </th>
                        <td>
                            {{ $assetVerification->t_1_mini_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetVerification.fields.t_1_mini_2') }}
                        </th>
                        <td>
                            {{ $assetVerification->t_1_mini_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetVerification.fields.till_drawer') }}
                        </th>
                        <td>
                            {{ $assetVerification->till_drawer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetVerification.fields.scanner') }}
                        </th>
                        <td>
                            {{ $assetVerification->scanner }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetVerification.fields.ups') }}
                        </th>
                        <td>
                            {{ $assetVerification->ups }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetVerification.fields.outlet') }}
                        </th>
                        <td>
                            {{ $assetVerification->outlet->site_name ?? '' }}
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