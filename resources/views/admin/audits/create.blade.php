@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.audit.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.audits.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('outlet_id') ? 'has-error' : '' }}">
                <label for="outlet">{{ trans('cruds.audit.fields.outlet') }}*</label>
                <select name="outlet_id" id="outlet" class="form-control select2" required>
                    @foreach($outlets as $id => $outlet)
                        <option value="{{ $id }}" {{ (isset($audit) && $audit->outlet ? $audit->outlet->id : old('outlet_id')) == $id ? 'selected' : '' }}>{{ $outlet }}</option>
                    @endforeach
                </select>
                @if($errors->has('outlet_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('outlet_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                <label for="date">{{ trans('cruds.audit.fields.date') }}*</label>
                <input type="text" id="date" name="date" class="form-control date" value="{{ old('date', isset($audit) ? $audit->date : '') }}" required>
                @if($errors->has('date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.audit.fields.date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                <label for="start_time">{{ trans('cruds.audit.fields.start_time') }}*</label>
                <input type="text" id="start_time" name="start_time" class="form-control timepicker" value="{{ old('start_time', isset($audit) ? $audit->start_time : '') }}" required>
                @if($errors->has('start_time'))
                    <em class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.audit.fields.start_time_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('end_time') ? 'has-error' : '' }}">
                <label for="end_time">{{ trans('cruds.audit.fields.end_time') }}*</label>
                <input type="text" id="end_time" name="end_time" class="form-control timepicker" value="{{ old('end_time', isset($audit) ? $audit->end_time : '') }}" required>
                @if($errors->has('end_time'))
                    <em class="invalid-feedback">
                        {{ $errors->first('end_time') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.audit.fields.end_time_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('device_in_correct_position') ? 'has-error' : '' }}">
                <label for="device_in_correct_position">{{ trans('cruds.audit.fields.device_in_correct_position') }}</label>
                <select id="device_in_correct_position" name="device_in_correct_position" class="form-control">
                    <option value="" disabled>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Audit::DEVICE_IN_CORRECT_POSITION_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('device_in_correct_position', 'Yes') === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('device_in_correct_position'))
                    <em class="invalid-feedback">
                        {{ $errors->first('device_in_correct_position') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('at_least_2_spare_till_rolls') ? 'has-error' : '' }}">
                <label for="at_least_2_spare_till_rolls">{{ trans('cruds.audit.fields.at_least_2_spare_till_rolls') }}*</label>
                <select id="at_least_2_spare_till_rolls" name="at_least_2_spare_till_rolls" class="form-control" required>
                    <option value="" disabled>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Audit::AT_LEAST_2_SPARE_TILL_ROLLS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('at_least_2_spare_till_rolls', 'Yes') === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('at_least_2_spare_till_rolls'))
                    <em class="invalid-feedback">
                        {{ $errors->first('at_least_2_spare_till_rolls') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('more_than_20_hola_club_cards_available') ? 'has-error' : '' }}">
                <label for="more_than_20_hola_club_cards_available">{{ trans('cruds.audit.fields.more_than_20_hola_club_cards_available') }}</label>
                <select id="more_than_20_hola_club_cards_available" name="more_than_20_hola_club_cards_available" class="form-control">
                    <option value="" disabled>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Audit::MORE_THAN_20_HOLA_CLUB_CARDS_AVAILABLE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('more_than_20_hola_club_cards_available', 'Yes') === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('more_than_20_hola_club_cards_available'))
                    <em class="invalid-feedback">
                        {{ $errors->first('more_than_20_hola_club_cards_available') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('kazang_poster_visible') ? 'has-error' : '' }}">
                <label for="kazang_poster_visible">{{ trans('cruds.audit.fields.kazang_poster_visible') }}*</label>
                <select id="kazang_poster_visible" name="kazang_poster_visible" class="form-control" required>
                    <option value="" disabled>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Audit::KAZANG_POSTER_VISIBLE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('kazang_poster_visible', 'Yes') === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('kazang_poster_visible'))
                    <em class="invalid-feedback">
                        {{ $errors->first('kazang_poster_visible') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('promo_poster_visible') ? 'has-error' : '' }}">
                <label for="promo_poster_visible">{{ trans('cruds.audit.fields.promo_poster_visible') }}</label>
                <select id="promo_poster_visible" name="promo_poster_visible" class="form-control">
                    <option value="" disabled>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Audit::PROMO_POSTER_VISIBLE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('promo_poster_visible', 'Yes') === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('promo_poster_visible'))
                    <em class="invalid-feedback">
                        {{ $errors->first('promo_poster_visible') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('hola_club_poster_available') ? 'has-error' : '' }}">
                <label for="hola_club_poster_available">{{ trans('cruds.audit.fields.hola_club_poster_available') }}</label>
                <select id="hola_club_poster_available" name="hola_club_poster_available" class="form-control">
                    <option value="" disabled>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Audit::HOLA_CLUB_POSTER_AVAILABLE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hola_club_poster_available', 'Yes') === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hola_club_poster_available'))
                    <em class="invalid-feedback">
                        {{ $errors->first('hola_club_poster_available') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('promotions_displayed_on_device') ? 'has-error' : '' }}">
                <label for="promotions_displayed_on_device">{{ trans('cruds.audit.fields.promotions_displayed_on_device') }}</label>
                <select id="promotions_displayed_on_device" name="promotions_displayed_on_device" class="form-control">
                    <option value="" disabled>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Audit::PROMOTIONS_DISPLAYED_ON_DEVICE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('promotions_displayed_on_device', 'Yes') === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('promotions_displayed_on_device'))
                    <em class="invalid-feedback">
                        {{ $errors->first('promotions_displayed_on_device') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('wholesaler_1') ? 'has-error' : '' }}">
                <label for="wholesaler_1">{{ trans('cruds.audit.fields.wholesaler_1') }}</label>
                <input type="text" id="wholesaler_1" name="wholesaler_1" class="form-control" value="{{ old('wholesaler_1', isset($audit) ? $audit->wholesaler_1 : '') }}">
                @if($errors->has('wholesaler_1'))
                    <em class="invalid-feedback">
                        {{ $errors->first('wholesaler_1') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.audit.fields.wholesaler_1_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('wholesaler_2') ? 'has-error' : '' }}">
                <label for="wholesaler_2">{{ trans('cruds.audit.fields.wholesaler_2') }}</label>
                <input type="text" id="wholesaler_2" name="wholesaler_2" class="form-control" value="{{ old('wholesaler_2', isset($audit) ? $audit->wholesaler_2 : '') }}">
                @if($errors->has('wholesaler_2'))
                    <em class="invalid-feedback">
                        {{ $errors->first('wholesaler_2') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.audit.fields.wholesaler_2_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('wholesaler_3') ? 'has-error' : '' }}">
                <label for="wholesaler_3">{{ trans('cruds.audit.fields.wholesaler_3') }}</label>
                <input type="text" id="wholesaler_3" name="wholesaler_3" class="form-control" value="{{ old('wholesaler_3', isset($audit) ? $audit->wholesaler_3 : '') }}">
                @if($errors->has('wholesaler_3'))
                    <em class="invalid-feedback">
                        {{ $errors->first('wholesaler_3') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.audit.fields.wholesaler_3_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection