<?php

namespace App\Http\Requests;

use App\TrainingModule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateTrainingModuleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('training_module_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
            ],
            'order' => [
                'digits_between:0,10',
            ],
        ];
    }
}
