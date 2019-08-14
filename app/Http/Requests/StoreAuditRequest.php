<?php

namespace App\Http\Requests;

use App\Audit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAuditRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('audit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'outlet_id'                   => [
                'required',
                'integer',
            ],
            'date'                        => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'start_time'                  => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'end_time'                    => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'at_least_2_spare_till_rolls' => [
                'required',
            ],
            'kazang_poster_visible'       => [
                'required',
            ],
        ];
    }
}
