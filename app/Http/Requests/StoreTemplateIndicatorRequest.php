<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTemplateIndicatorRequest extends FormRequest
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
            'description'                   => ['required','string'],
            'order'                         => ['required','numeric','min:1'],
            'indicator_weight'              => ['required','numeric','min:1'],
            'indicator_type_id'             => ['required','numeric','min:1'],
            'indicator_unit_of_measure_id'  => ['required'],
            

        ];
    }

    public function messages()
{
    return [
        'name.required' => 'A name is required',
        'name.min' => 'The Indicator name is too short',
    
    ];
}
}
