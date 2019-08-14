@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.fieldOpsRequest.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fieldOpsRequest.fields.id') }}
                        </th>
                        <td>
                            {{ $fieldOpsRequest->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fieldOpsRequest.fields.outlet') }}
                        </th>
                        <td>
                            {{ $fieldOpsRequest->outlet->site_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fieldOpsRequest.fields.device') }}
                        </th>
                        <td>
                            {{ App\FieldOpsRequest::DEVICE_SELECT[$fieldOpsRequest->device] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fieldOpsRequest.fields.fault_reason') }}
                        </th>
                        <td>
                            {{ App\FieldOpsRequest::FAULT_REASON_SELECT[$fieldOpsRequest->fault_reason] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fieldOpsRequest.fields.fault_description') }}
                        </th>
                        <td>
                            {!! $fieldOpsRequest->fault_description !!}
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