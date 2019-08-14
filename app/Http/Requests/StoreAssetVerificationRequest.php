<?php

namespace App\Http\Requests;

use App\AssetVerification;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAssetVerificationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('asset_verification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'date'        => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'start_time'  => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'end_time'    => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            't_1_mini_1'  => [
                'required',
            ],
            't_1_mini_2'  => [
                'required',
            ],
            'till_drawer' => [
                'required',
            ],
            'scanner'     => [
                'required',
            ],
            'ups'         => [
                'required',
            ],
            'outlet_id'   => [
                'required',
                'integer',
            ],
        ];
    }
}
