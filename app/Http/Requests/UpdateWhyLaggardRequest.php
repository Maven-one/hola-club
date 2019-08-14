<?php

namespace App\Http\Requests;

use App\WhyLaggard;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateWhyLaggardRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('why_laggard_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
