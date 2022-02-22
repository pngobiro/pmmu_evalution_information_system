<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIndicatorRequest extends FormRequest
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
            'order'                         => ['required','numeric','min:1'],
            'indicator_weight'              => ['required','numeric','min:1'],
            'indicator_type_id'             => ['required','numeric','min:1'],
            'indicator_unit_of_measure_id'  => ['required','numeric','min:1'],
        ];
    }
}
