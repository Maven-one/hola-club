@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.audit.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.audit.fields.id') }}
                        </th>
                        <td>
                            {{ $audit->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audit.fields.outlet') }}
                        </th>
                        <td>
                            {{ $audit->outlet->site_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audit.fields.date') }}
                        </th>
                        <td>
                            {{ $audit->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audit.fields.start_time') }}
                        </th>
                        <td>
                            {{ $audit->start_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audit.fields.end_time') }}
                        </th>
                        <td>
                            {{ $audit->end_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audit.fields.device_in_correct_position') }}
                        </th>
                        <td>
                            {{ App\Audit::DEVICE_IN_CORRECT_POSITION_SELECT[$audit->device_in_correct_position] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audit.fields.at_least_2_spare_till_rolls') }}
                        </th>
                        <td>
                            {{ App\Audit::AT_LEAST_2_SPARE_TILL_ROLLS_SELECT[$audit->at_least_2_spare_till_rolls] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audit.fields.more_than_20_hola_club_cards_available') }}
                        </th>
                        <td>
                            {{ App\Audit::MORE_THAN_20_HOLA_CLUB_CARDS_AVAILABLE_SELECT[$audit->more_than_20_hola_club_cards_available] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audit.fields.kazang_poster_visible') }}
                        </th>
                        <td>
                            {{ App\Audit::KAZANG_POSTER_VISIBLE_SELECT[$audit->kazang_poster_visible] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audit.fields.promo_poster_visible') }}
                        </th>
                        <td>
                            {{ App\Audit::PROMO_POSTER_VISIBLE_SELECT[$audit->promo_poster_visible] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audit.fields.hola_club_poster_available') }}
                        </th>
                        <td>
                            {{ App\Audit::HOLA_CLUB_POSTER_AVAILABLE_SELECT[$audit->hola_club_poster_available] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audit.fields.promotions_displayed_on_device') }}
                        </th>
                        <td>
                            {{ App\Audit::PROMOTIONS_DISPLAYED_ON_DEVICE_SELECT[$audit->promotions_displayed_on_device] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audit.fields.wholesaler_1') }}
                        </th>
                        <td>
                            {{ $audit->wholesaler_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audit.fields.wholesaler_2') }}
                        </th>
                        <td>
                            {{ $audit->wholesaler_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.audit.fields.wholesaler_3') }}
                        </th>
                        <td>
                            {{ $audit->wholesaler_3 }}
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