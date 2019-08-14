@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.fieldOpsRequest.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.field-ops-requests.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('outlet_id') ? 'has-error' : '' }}">
                <label for="outlet">{{ trans('cruds.fieldOpsRequest.fields.outlet') }}*</label>
                <select name="outlet_id" id="outlet" class="form-control select2" required>
                    @foreach($outlets as $id => $outlet)
                        <option value="{{ $id }}" {{ (isset($fieldOpsRequest) && $fieldOpsRequest->outlet ? $fieldOpsRequest->outlet->id : old('outlet_id')) == $id ? 'selected' : '' }}>{{ $outlet }}</option>
                    @endforeach
                </select>
                @if($errors->has('outlet_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('outlet_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('device') ? 'has-error' : '' }}">
                <label for="device">{{ trans('cruds.fieldOpsRequest.fields.device') }}</label>
                <select id="device" name="device" class="form-control">
                    <option value="" disabled {{ old('device', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\FieldOpsRequest::DEVICE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('device', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('device'))
                    <em class="invalid-feedback">
                        {{ $errors->first('device') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('fault_reason') ? 'has-error' : '' }}">
                <label for="fault_reason">{{ trans('cruds.fieldOpsRequest.fields.fault_reason') }}*</label>
                <select id="fault_reason" name="fault_reason" class="form-control" required>
                    <option value="" disabled {{ old('fault_reason', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\FieldOpsRequest::FAULT_REASON_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('fault_reason', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('fault_reason'))
                    <em class="invalid-feedback">
                        {{ $errors->first('fault_reason') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('fault_description') ? 'has-error' : '' }}">
                <label for="fault_description">{{ trans('cruds.fieldOpsRequest.fields.fault_description') }}</label>
                <textarea id="fault_description" name="fault_description" class="form-control ">{{ old('fault_description', isset($fieldOpsRequest) ? $fieldOpsRequest->fault_description : '') }}</textarea>
                @if($errors->has('fault_description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('fault_description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.fieldOpsRequest.fields.fault_description_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection