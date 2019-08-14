<?php

namespace App\Http\Requests;

use App\CallCycle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCallCycleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('call_cycle_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'outlet_id'                 => [
                'required',
                'integer',
            ],
            'csr_role_id'               => [
                'required',
                'integer',
            ],
            'csr_user_id'               => [
                'required',
                'integer',
            ],
            'scheduled_visit_date_time' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}
