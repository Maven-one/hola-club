<?php

namespace App\Http\Requests;

use App\FieldOpsRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateFieldOpsRequestRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('field_ops_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'outlet_id'    => [
                'required',
                'integer',
            ],
            'fault_reason' => [
                'required',
            ],
        ];
    }
}
