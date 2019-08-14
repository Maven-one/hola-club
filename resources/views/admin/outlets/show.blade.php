@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.outlet.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.id') }}
                        </th>
                        <td>
                            {{ $outlet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.id_external') }}
                        </th>
                        <td>
                            {{ $outlet->id_external }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.sitecode') }}
                        </th>
                        <td>
                            {{ $outlet->sitecode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.site_name') }}
                        </th>
                        <td>
                            {{ $outlet->site_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.correct_outlet_name') }}
                        </th>
                        <td>
                            {{ $outlet->correct_outlet_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.installation_date') }}
                        </th>
                        <td>
                            {{ $outlet->installation_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.wave') }}
                        </th>
                        <td>
                            {{ $outlet->wave }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.status') }}
                        </th>
                        <td>
                            {{ App\Outlet::STATUS_SELECT[$outlet->status] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.outlet_feedback') }}
                        </th>
                        <td>
                            {!! $outlet->outlet_feedback !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.gps') }}
                        </th>
                        <td>
                            {{ $outlet->gps }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.w_3_w') }}
                        </th>
                        <td>
                            {{ $outlet->w_3_w }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.area') }}
                        </th>
                        <td>
                            {{ App\Outlet::AREA_SELECT[$outlet->area] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.province') }}
                        </th>
                        <td>
                            {{ App\Outlet::PROVINCE_SELECT[$outlet->province] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.owner_role') }}
                        </th>
                        <td>
                            {{ $outlet->owner_role->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.owner_user') }}
                        </th>
                        <td>
                            {{ $outlet->owner_user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.heineken_rep_role') }}
                        </th>
                        <td>
                            {{ $outlet->heineken_rep_role->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.heineken_rep_user') }}
                        </th>
                        <td>
                            {{ $outlet->heineken_rep_user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.css_role') }}
                        </th>
                        <td>
                            {{ $outlet->css_role->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.css_user') }}
                        </th>
                        <td>
                            {{ $outlet->css_user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.csr_role') }}
                        </th>
                        <td>
                            {{ $outlet->csr_role->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.csr_user') }}
                        </th>
                        <td>
                            {{ $outlet->csr_user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.field_ops_role') }}
                        </th>
                        <td>
                            {{ $outlet->field_ops_role->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.field_ops_user') }}
                        </th>
                        <td>
                            {{ $outlet->field_ops_user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.rebate_option') }}
                        </th>
                        <td>
                            {{ App\Outlet::REBATE_OPTION_SELECT[$outlet->rebate_option] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.account_number') }}
                        </th>
                        <td>
                            {{ $outlet->account_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.balance') }}
                        </th>
                        <td>
                            ${{ $outlet->balance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.baskets_this_month') }}
                        </th>
                        <td>
                            {{ $outlet->baskets_this_month }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.baskets_last_90_days') }}
                        </th>
                        <td>
                            {{ $outlet->baskets_last_90_days }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.baskets_last_2_weeks') }}
                        </th>
                        <td>
                            {{ $outlet->baskets_last_2_weeks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.qty_last_2_weeks') }}
                        </th>
                        <td>
                            {{ $outlet->qty_last_2_weeks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.no_of_active_shoppers_this_month') }}
                        </th>
                        <td>
                            {{ $outlet->no_of_active_shoppers_this_month }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.no_of_active_shoppers_last_2_weeks') }}
                        </th>
                        <td>
                            {{ $outlet->no_of_active_shoppers_last_2_weeks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.no_of_active_shoppers_all_time') }}
                        </th>
                        <td>
                            {{ $outlet->no_of_active_shoppers_all_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.no_of_unique_taps_this_month') }}
                        </th>
                        <td>
                            {{ $outlet->no_of_unique_taps_this_month }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.no_of_unique_taps_last_2_weeks') }}
                        </th>
                        <td>
                            {{ $outlet->no_of_unique_taps_last_2_weeks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.caselot_performance') }}
                        </th>
                        <td>
                            {{ $outlet->caselot_performance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.how_do_i_improve_this_outlet') }}
                        </th>
                        <td>
                            {!! $outlet->how_do_i_improve_this_outlet !!}
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