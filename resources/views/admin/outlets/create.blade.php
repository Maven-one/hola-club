@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.outlet.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.outlets.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('id_external') ? 'has-error' : '' }}">
                <label for="id_external">{{ trans('cruds.outlet.fields.id_external') }}*</label>
                <input type="number" id="id_external" name="id_external" class="form-control" value="{{ old('id_external', isset($outlet) ? $outlet->id_external : '') }}" step="1" required>
                @if($errors->has('id_external'))
                    <em class="invalid-feedback">
                        {{ $errors->first('id_external') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.outlet.fields.id_external_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sitecode') ? 'has-error' : '' }}">
                <label for="sitecode">{{ trans('cruds.outlet.fields.sitecode') }}*</label>
                <input type="text" id="sitecode" name="sitecode" class="form-control" value="{{ old('sitecode', isset($outlet) ? $outlet->sitecode : '') }}" required>
                @if($errors->has('sitecode'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sitecode') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.outlet.fields.sitecode_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('site_name') ? 'has-error' : '' }}">
                <label for="site_name">{{ trans('cruds.outlet.fields.site_name') }}*</label>
                <input type="text" id="site_name" name="site_name" class="form-control" value="{{ old('site_name', isset($outlet) ? $outlet->site_name : '') }}" required>
                @if($errors->has('site_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('site_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.outlet.fields.site_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('correct_outlet_name') ? 'has-error' : '' }}">
                <label for="correct_outlet_name">{{ trans('cruds.outlet.fields.correct_outlet_name') }}</label>
                <input type="text" id="correct_outlet_name" name="correct_outlet_name" class="form-control" value="{{ old('correct_outlet_name', isset($outlet) ? $outlet->correct_outlet_name : '') }}">
                @if($errors->has('correct_outlet_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('correct_outlet_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.outlet.fields.correct_outlet_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('installation_date') ? 'has-error' : '' }}">
                <label for="installation_date">{{ trans('cruds.outlet.fields.installation_date') }}*</label>
                <input type="text" id="installation_date" name="installation_date" class="form-control date" value="{{ old('installation_date', isset($outlet) ? $outlet->installation_date : '') }}" required>
                @if($errors->has('installation_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('installation_date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.outlet.fields.installation_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.outlet.fields.status') }}*</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="" disabled>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Outlet::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'Active') === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <em class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('outlet_feedback') ? 'has-error' : '' }}">
                <label for="outlet_feedback">{{ trans('cruds.outlet.fields.outlet_feedback') }}</label>
                <textarea id="outlet_feedback" name="outlet_feedback" class="form-control ">{{ old('outlet_feedback', isset($outlet) ? $outlet->outlet_feedback : '') }}</textarea>
                @if($errors->has('outlet_feedback'))
                    <em class="invalid-feedback">
                        {{ $errors->first('outlet_feedback') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.outlet.fields.outlet_feedback_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('gps') ? 'has-error' : '' }}">
                <label for="gps">{{ trans('cruds.outlet.fields.gps') }}</label>
                <input type="text" id="gps" name="gps" class="form-control" value="{{ old('gps', isset($outlet) ? $outlet->gps : '') }}">
                @if($errors->has('gps'))
                    <em class="invalid-feedback">
                        {{ $errors->first('gps') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.outlet.fields.gps_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('w_3_w') ? 'has-error' : '' }}">
                <label for="w_3_w">{{ trans('cruds.outlet.fields.w_3_w') }}</label>
                <input type="text" id="w_3_w" name="w_3_w" class="form-control" value="{{ old('w_3_w', isset($outlet) ? $outlet->w_3_w : '') }}">
                @if($errors->has('w_3_w'))
                    <em class="invalid-feedback">
                        {{ $errors->first('w_3_w') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.outlet.fields.w_3_w_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                <label for="area">{{ trans('cruds.outlet.fields.area') }}</label>
                <select id="area" name="area" class="form-control">
                    <option value="" disabled {{ old('area', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Outlet::AREA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('area', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('area'))
                    <em class="invalid-feedback">
                        {{ $errors->first('area') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('province') ? 'has-error' : '' }}">
                <label for="province">{{ trans('cruds.outlet.fields.province') }}</label>
                <select id="province" name="province" class="form-control">
                    <option value="" disabled {{ old('province', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Outlet::PROVINCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('province', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('province'))
                    <em class="invalid-feedback">
                        {{ $errors->first('province') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('owner_role_id') ? 'has-error' : '' }}">
                <label for="owner_role">{{ trans('cruds.outlet.fields.owner_role') }}</label>
                <select name="owner_role_id" id="owner_role" class="form-control select2">
                    @foreach($owner_roles as $id => $owner_role)
                        <option value="{{ $id }}" {{ (isset($outlet) && $outlet->owner_role ? $outlet->owner_role->id : old('owner_role_id')) == $id ? 'selected' : '' }}>{{ $owner_role }}</option>
                    @endforeach
                </select>
                @if($errors->has('owner_role_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('owner_role_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('owner_user_id') ? 'has-error' : '' }}">
                <label for="owner_user">{{ trans('cruds.outlet.fields.owner_user') }}</label>
                <select name="owner_user_id" id="owner_user" class="form-control select2">
                    @foreach($owner_users as $id => $owner_user)
                        <option value="{{ $id }}" {{ (isset($outlet) && $outlet->owner_user ? $outlet->owner_user->id : old('owner_user_id')) == $id ? 'selected' : '' }}>{{ $owner_user }}</option>
                    @endforeach
                </select>
                @if($errors->has('owner_user_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('owner_user_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('heineken_rep_role_id') ? 'has-error' : '' }}">
                <label for="heineken_rep_role">{{ trans('cruds.outlet.fields.heineken_rep_role') }}</label>
                <select name="heineken_rep_role_id" id="heineken_rep_role" class="form-control select2">
                    @foreach($heineken_rep_roles as $id => $heineken_rep_role)
                        <option value="{{ $id }}" {{ (isset($outlet) && $outlet->heineken_rep_role ? $outlet->heineken_rep_role->id : old('heineken_rep_role_id')) == $id ? 'selected' : '' }}>{{ $heineken_rep_role }}</option>
                    @endforeach
                </select>
                @if($errors->has('heineken_rep_role_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('heineken_rep_role_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('heineken_rep_user_id') ? 'has-error' : '' }}">
                <label for="heineken_rep_user">{{ trans('cruds.outlet.fields.heineken_rep_user') }}</label>
                <select name="heineken_rep_user_id" id="heineken_rep_user" class="form-control select2">
                    @foreach($heineken_rep_users as $id => $heineken_rep_user)
                        <option value="{{ $id }}" {{ (isset($outlet) && $outlet->heineken_rep_user ? $outlet->heineken_rep_user->id : old('heineken_rep_user_id')) == $id ? 'selected' : '' }}>{{ $heineken_rep_user }}</option>
                    @endforeach
                </select>
                @if($errors->has('heineken_rep_user_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('heineken_rep_user_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('css_role_id') ? 'has-error' : '' }}">
                <label for="css_role">{{ trans('cruds.outlet.fields.css_role') }}*</label>
                <select name="css_role_id" id="css_role" class="form-control select2" required>
                    @foreach($css_roles as $id => $css_role)
                        <option value="{{ $id }}" {{ (isset($outlet) && $outlet->css_role ? $outlet->css_role->id : old('css_role_id')) == $id ? 'selected' : '' }}>{{ $css_role }}</option>
                    @endforeach
                </select>
                @if($errors->has('css_role_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('css_role_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('css_user_id') ? 'has-error' : '' }}">
                <label for="css_user">{{ trans('cruds.outlet.fields.css_user') }}*</label>
                <select name="css_user_id" id="css_user" class="form-control select2" required>
                    @foreach($css_users as $id => $css_user)
                        <option value="{{ $id }}" {{ (isset($outlet) && $outlet->css_user ? $outlet->css_user->id : old('css_user_id')) == $id ? 'selected' : '' }}>{{ $css_user }}</option>
                    @endforeach
                </select>
                @if($errors->has('css_user_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('css_user_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('csr_role_id') ? 'has-error' : '' }}">
                <label for="csr_role">{{ trans('cruds.outlet.fields.csr_role') }}*</label>
                <select name="csr_role_id" id="csr_role" class="form-control select2" required>
                    @foreach($csr_roles as $id => $csr_role)
                        <option value="{{ $id }}" {{ (isset($outlet) && $outlet->csr_role ? $outlet->csr_role->id : old('csr_role_id')) == $id ? 'selected' : '' }}>{{ $csr_role }}</option>
                    @endforeach
                </select>
                @if($errors->has('csr_role_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('csr_role_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('csr_user_id') ? 'has-error' : '' }}">
                <label for="csr_user">{{ trans('cruds.outlet.fields.csr_user') }}</label>
                <select name="csr_user_id" id="csr_user" class="form-control select2">
                    @foreach($csr_users as $id => $csr_user)
                        <option value="{{ $id }}" {{ (isset($outlet) && $outlet->csr_user ? $outlet->csr_user->id : old('csr_user_id')) == $id ? 'selected' : '' }}>{{ $csr_user }}</option>
                    @endforeach
                </select>
                @if($errors->has('csr_user_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('csr_user_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('field_ops_role_id') ? 'has-error' : '' }}">
                <label for="field_ops_role">{{ trans('cruds.outlet.fields.field_ops_role') }}</label>
                <select name="field_ops_role_id" id="field_ops_role" class="form-control select2">
                    @foreach($field_ops_roles as $id => $field_ops_role)
                        <option value="{{ $id }}" {{ (isset($outlet) && $outlet->field_ops_role ? $outlet->field_ops_role->id : old('field_ops_role_id')) == $id ? 'selected' : '' }}>{{ $field_ops_role }}</option>
                    @endforeach
                </select>
                @if($errors->has('field_ops_role_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('field_ops_role_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('field_ops_user_id') ? 'has-error' : '' }}">
                <label for="field_ops_user">{{ trans('cruds.outlet.fields.field_ops_user') }}*</label>
                <select name="field_ops_user_id" id="field_ops_user" class="form-control select2" required>
                    @foreach($field_ops_users as $id => $field_ops_user)
                        <option value="{{ $id }}" {{ (isset($outlet) && $outlet->field_ops_user ? $outlet->field_ops_user->id : old('field_ops_user_id')) == $id ? 'selected' : '' }}>{{ $field_ops_user }}</option>
                    @endforeach
                </select>
                @if($errors->has('field_ops_user_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('field_ops_user_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('rebate_option') ? 'has-error' : '' }}">
                <label for="rebate_option">{{ trans('cruds.outlet.fields.rebate_option') }}</label>
                <select id="rebate_option" name="rebate_option" class="form-control">
                    <option value="" disabled>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Outlet::REBATE_OPTION_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('rebate_option', 'Kazang') === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('rebate_option'))
                    <em class="invalid-feedback">
                        {{ $errors->first('rebate_option') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('account_number') ? 'has-error' : '' }}">
                <label for="account_number">{{ trans('cruds.outlet.fields.account_number') }}</label>
                <input type="text" id="account_number" name="account_number" class="form-control" value="{{ old('account_number', isset($outlet) ? $outlet->account_number : '') }}">
                @if($errors->has('account_number'))
                    <em class="invalid-feedback">
                        {{ $errors->first('account_number') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.outlet.fields.account_number_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('how_do_i_improve_this_outlet') ? 'has-error' : '' }}">
                <label for="how_do_i_improve_this_outlet">{{ trans('cruds.outlet.fields.how_do_i_improve_this_outlet') }}</label>
                <textarea id="how_do_i_improve_this_outlet" name="how_do_i_improve_this_outlet" class="form-control ">{{ old('how_do_i_improve_this_outlet', isset($outlet) ? $outlet->how_do_i_improve_this_outlet : '') }}</textarea>
                @if($errors->has('how_do_i_improve_this_outlet'))
                    <em class="invalid-feedback">
                        {{ $errors->first('how_do_i_improve_this_outlet') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.outlet.fields.how_do_i_improve_this_outlet_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection