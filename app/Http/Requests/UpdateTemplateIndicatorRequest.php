<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTemplateIndicatorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                          => ['required','string'],
            'indicator_group_id'            => ['required','integer'],
            'order'                         => ['required','numeric','min:1'],
            'indicator_weight'              => ['required','numeric','min:1'],
            'master_indicator_id'           => ['required','numeric'],
            'indicator_type_id'             => ['required','numeric','min:1'],
            'indicator_unit_of_measure_id'  => ['required','numeric','min:1'],
            'is_backlog_indicator'         =>  ['required','boolean'],
        ];
    }
}
