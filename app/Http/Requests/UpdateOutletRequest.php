<?php

namespace App\Http\Requests;

use App\Outlet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateOutletRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('outlet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'id_external'       => [
                'required',
                'digits_between:0,10',
            ],
            'sitecode'          => [
                'min:3',
                'max:8',
                'required',
            ],
            'site_name'         => [
                'required',
            ],
            'installation_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'status'            => [
                'required',
            ],
            'css_role_id'       => [
                'required',
                'integer',
            ],
            'css_user_id'       => [
                'required',
                'integer',
            ],
            'csr_role_id'       => [
                'required',
                'integer',
            ],
            'field_ops_user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
