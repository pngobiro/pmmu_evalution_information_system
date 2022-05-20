<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIndicatorRequest extends FormRequest
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
            'unit_rank_id'                  => ['required','integer'],
            'indicator_group_id'            => ['required','integer'],
            'order'                         => ['required','numeric','min:1'],
            'indicator_weight'              => ['required','numeric','min:1'],
            'indicator_type_id'             => ['required','numeric','min:1'],
            'indicator_unit_of_measure_id'  => ['required','numeric','min:1'],
            'indicator_target'              => ['required','numeric','min:1'],
            'is_backlog_indicator'          => ['required','boolean'],
            'remarks'                       => ['nullable','string'],
        ];
    }
}
