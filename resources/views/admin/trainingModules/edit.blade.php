@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.trainingModule.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.training-modules.update", [$trainingModule->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.trainingModule.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($trainingModule) ? $trainingModule->title : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trainingModule.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('order') ? 'has-error' : '' }}">
                <label for="order">{{ trans('cruds.trainingModule.fields.order') }}</label>
                <input type="number" id="order" name="order" class="form-control" value="{{ old('order', isset($trainingModule) ? $trainingModule->order : '') }}" step="1">
                @if($errors->has('order'))
                    <em class="invalid-feedback">
                        {{ $errors->first('order') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trainingModule.fields.order_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection