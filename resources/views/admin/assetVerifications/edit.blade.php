@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.assetVerification.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.asset-verifications.update", [$assetVerification->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                <label for="date">{{ trans('cruds.assetVerification.fields.date') }}*</label>
                <input type="text" id="date" name="date" class="form-control date" value="{{ old('date', isset($assetVerification) ? $assetVerification->date : '') }}" required>
                @if($errors->has('date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.assetVerification.fields.date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                <label for="start_time">{{ trans('cruds.assetVerification.fields.start_time') }}*</label>
                <input type="text" id="start_time" name="start_time" class="form-control timepicker" value="{{ old('start_time', isset($assetVerification) ? $assetVerification->start_time : '') }}" required>
                @if($errors->has('start_time'))
                    <em class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.assetVerification.fields.start_time_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('end_time') ? 'has-error' : '' }}">
                <label for="end_time">{{ trans('cruds.assetVerification.fields.end_time') }}*</label>
                <input type="text" id="end_time" name="end_time" class="form-control timepicker" value="{{ old('end_time', isset($assetVerification) ? $assetVerification->end_time : '') }}" required>
                @if($errors->has('end_time'))
                    <em class="invalid-feedback">
                        {{ $errors->first('end_time') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.assetVerification.fields.end_time_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('t_1_mini_1') ? 'has-error' : '' }}">
                <label for="t_1_mini_1">{{ trans('cruds.assetVerification.fields.t_1_mini_1') }}*</label>
                <input type="text" id="t_1_mini_1" name="t_1_mini_1" class="form-control" value="{{ old('t_1_mini_1', isset($assetVerification) ? $assetVerification->t_1_mini_1 : '') }}" required>
                @if($errors->has('t_1_mini_1'))
                    <em class="invalid-feedback">
                        {{ $errors->first('t_1_mini_1') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.assetVerification.fields.t_1_mini_1_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('t_1_mini_2') ? 'has-error' : '' }}">
                <label for="t_1_mini_2">{{ trans('cruds.assetVerification.fields.t_1_mini_2') }}*</label>
                <input type="text" id="t_1_mini_2" name="t_1_mini_2" class="form-control" value="{{ old('t_1_mini_2', isset($assetVerification) ? $assetVerification->t_1_mini_2 : '') }}" required>
                @if($errors->has('t_1_mini_2'))
                    <em class="invalid-feedback">
                        {{ $errors->first('t_1_mini_2') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.assetVerification.fields.t_1_mini_2_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('till_drawer') ? 'has-error' : '' }}">
                <label for="till_drawer">{{ trans('cruds.assetVerification.fields.till_drawer') }}*</label>
                <input type="text" id="till_drawer" name="till_drawer" class="form-control" value="{{ old('till_drawer', isset($assetVerification) ? $assetVerification->till_drawer : '') }}" required>
                @if($errors->has('till_drawer'))
                    <em class="invalid-feedback">
                        {{ $errors->first('till_drawer') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.assetVerification.fields.till_drawer_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('scanner') ? 'has-error' : '' }}">
                <label for="scanner">{{ trans('cruds.assetVerification.fields.scanner') }}*</label>
                <input type="text" id="scanner" name="scanner" class="form-control" value="{{ old('scanner', isset($assetVerification) ? $assetVerification->scanner : '') }}" required>
                @if($errors->has('scanner'))
                    <em class="invalid-feedback">
                        {{ $errors->first('scanner') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.assetVerification.fields.scanner_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ups') ? 'has-error' : '' }}">
                <label for="ups">{{ trans('cruds.assetVerification.fields.ups') }}*</label>
                <input type="text" id="ups" name="ups" class="form-control" value="{{ old('ups', isset($assetVerification) ? $assetVerification->ups : '') }}" required>
                @if($errors->has('ups'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ups') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.assetVerification.fields.ups_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('outlet_id') ? 'has-error' : '' }}">
                <label for="outlet">{{ trans('cruds.assetVerification.fields.outlet') }}*</label>
                <select name="outlet_id" id="outlet" class="form-control select2" required>
                    @foreach($outlets as $id => $outlet)
                        <option value="{{ $id }}" {{ (isset($assetVerification) && $assetVerification->outlet ? $assetVerification->outlet->id : old('outlet_id')) == $id ? 'selected' : '' }}>{{ $outlet }}</option>
                    @endforeach
                </select>
                @if($errors->has('outlet_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('outlet_id') }}
                    </em>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection