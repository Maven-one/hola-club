<?php

namespace App\Http\Requests;

use App\Training;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateTrainingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('training_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'date'               => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'start_time'         => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'end_time'           => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'training_modules.*' => [
                'integer',
            ],
            'training_modules'   => [
                'required',
                'array',
            ],
            'person_trained'     => [
                'required',
            ],
        ];
    }
}
