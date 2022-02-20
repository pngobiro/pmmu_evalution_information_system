<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTemplateIndicatorGroupRequest extends FormRequest
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
            'unit_rank_id'                  => ['required'],
            'financial_year_id'             => ['required'],
    
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
