@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.training.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.trainings.update", [$training->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('outlet_id') ? 'has-error' : '' }}">
                <label for="outlet">{{ trans('cruds.training.fields.outlet') }}</label>
                <select name="outlet_id" id="outlet" class="form-control select2">
                    @foreach($outlets as $id => $outlet)
                        <option value="{{ $id }}" {{ (isset($training) && $training->outlet ? $training->outlet->id : old('outlet_id')) == $id ? 'selected' : '' }}>{{ $outlet }}</option>
                    @endforeach
                </select>
                @if($errors->has('outlet_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('outlet_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                <label for="date">{{ trans('cruds.training.fields.date') }}*</label>
                <input type="text" id="date" name="date" class="form-control date" value="{{ old('date', isset($training) ? $training->date : '') }}" required>
                @if($errors->has('date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.training.fields.date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                <label for="start_time">{{ trans('cruds.training.fields.start_time') }}</label>
                <input type="text" id="start_time" name="start_time" class="form-control timepicker" value="{{ old('start_time', isset($training) ? $training->start_time : '') }}">
                @if($errors->has('start_time'))
                    <em class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.training.fields.start_time_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('end_time') ? 'has-error' : '' }}">
                <label for="end_time">{{ trans('cruds.training.fields.end_time') }}*</label>
                <input type="text" id="end_time" name="end_time" class="form-control timepicker" value="{{ old('end_time', isset($training) ? $training->end_time : '') }}" required>
                @if($errors->has('end_time'))
                    <em class="invalid-feedback">
                        {{ $errors->first('end_time') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.training.fields.end_time_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('training_modules') ? 'has-error' : '' }}">
                <label for="training_modules">{{ trans('cruds.training.fields.training_modules') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="training_modules[]" id="training_modules" class="form-control select2" multiple="multiple" required>
                    @foreach($training_modules as $id => $training_modules)
                        <option value="{{ $id }}" {{ (in_array($id, old('training_modules', [])) || isset($training) && $training->training_modules->contains($id)) ? 'selected' : '' }}>{{ $training_modules }}</option>
                    @endforeach
                </select>
                @if($errors->has('training_modules'))
                    <em class="invalid-feedback">
                        {{ $errors->first('training_modules') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.training.fields.training_modules_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('person_trained') ? 'has-error' : '' }}">
                <label for="person_trained">{{ trans('cruds.training.fields.person_trained') }}*</label>
                <input type="text" id="person_trained" name="person_trained" class="form-control" value="{{ old('person_trained', isset($training) ? $training->person_trained : '') }}" required>
                @if($errors->has('person_trained'))
                    <em class="invalid-feedback">
                        {{ $errors->first('person_trained') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.training.fields.person_trained_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('feedback') ? 'has-error' : '' }}">
                <label for="feedback">{{ trans('cruds.training.fields.feedback') }}</label>
                <textarea id="feedback" name="feedback" class="form-control ">{{ old('feedback', isset($training) ? $training->feedback : '') }}</textarea>
                @if($errors->has('feedback'))
                    <em class="invalid-feedback">
                        {{ $errors->first('feedback') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.training.fields.feedback_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection