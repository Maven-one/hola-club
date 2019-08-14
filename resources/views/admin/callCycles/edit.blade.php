@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.callCycle.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.call-cycles.update", [$callCycle->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('outlet_id') ? 'has-error' : '' }}">
                <label for="outlet">{{ trans('cruds.callCycle.fields.outlet') }}*</label>
                <select name="outlet_id" id="outlet" class="form-control select2" required>
                    @foreach($outlets as $id => $outlet)
                        <option value="{{ $id }}" {{ (isset($callCycle) && $callCycle->outlet ? $callCycle->outlet->id : old('outlet_id')) == $id ? 'selected' : '' }}>{{ $outlet }}</option>
                    @endforeach
                </select>
                @if($errors->has('outlet_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('outlet_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('csr_role_id') ? 'has-error' : '' }}">
                <label for="csr_role">{{ trans('cruds.callCycle.fields.csr_role') }}*</label>
                <select name="csr_role_id" id="csr_role" class="form-control select2" required>
                    @foreach($csr_roles as $id => $csr_role)
                        <option value="{{ $id }}" {{ (isset($callCycle) && $callCycle->csr_role ? $callCycle->csr_role->id : old('csr_role_id')) == $id ? 'selected' : '' }}>{{ $csr_role }}</option>
                    @endforeach
                </select>
                @if($errors->has('csr_role_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('csr_role_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('csr_user_id') ? 'has-error' : '' }}">
                <label for="csr_user">{{ trans('cruds.callCycle.fields.csr_user') }}*</label>
                <select name="csr_user_id" id="csr_user" class="form-control select2" required>
                    @foreach($csr_users as $id => $csr_user)
                        <option value="{{ $id }}" {{ (isset($callCycle) && $callCycle->csr_user ? $callCycle->csr_user->id : old('csr_user_id')) == $id ? 'selected' : '' }}>{{ $csr_user }}</option>
                    @endforeach
                </select>
                @if($errors->has('csr_user_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('csr_user_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('scheduled_visit_date_time') ? 'has-error' : '' }}">
                <label for="scheduled_visit_date_time">{{ trans('cruds.callCycle.fields.scheduled_visit_date_time') }}*</label>
                <input type="text" id="scheduled_visit_date_time" name="scheduled_visit_date_time" class="form-control datetime" value="{{ old('scheduled_visit_date_time', isset($callCycle) ? $callCycle->scheduled_visit_date_time : '') }}" required>
                @if($errors->has('scheduled_visit_date_time'))
                    <em class="invalid-feedback">
                        {{ $errors->first('scheduled_visit_date_time') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.callCycle.fields.scheduled_visit_date_time_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection