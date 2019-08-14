<?php

namespace App\Http\Requests;

use App\CallCycle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCallCycleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('call_cycle_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:call_cycles,id',
        ];
    }
}
