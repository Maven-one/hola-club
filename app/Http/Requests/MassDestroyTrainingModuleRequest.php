<?php

namespace App\Http\Requests;

use App\TrainingModule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTrainingModuleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('training_module_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:training_modules,id',
        ];
    }
}
