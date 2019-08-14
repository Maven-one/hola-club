@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.callCycle.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.callCycle.fields.id') }}
                        </th>
                        <td>
                            {{ $callCycle->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.callCycle.fields.outlet') }}
                        </th>
                        <td>
                            {{ $callCycle->outlet->site_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.callCycle.fields.csr_role') }}
                        </th>
                        <td>
                            {{ $callCycle->csr_role->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.callCycle.fields.csr_user') }}
                        </th>
                        <td>
                            {{ $callCycle->csr_user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.callCycle.fields.scheduled_visit_date_time') }}
                        </th>
                        <td>
                            {{ $callCycle->scheduled_visit_date_time }}
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