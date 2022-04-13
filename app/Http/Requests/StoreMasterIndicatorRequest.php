<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMasterIndicatorRequest extends FormRequest
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

            

        ];
    }

    public function messages()
{
    return [
        'name.required' => 'A name is required',
        'name.min' => 'The Indicator name is too short',
    
    ];
}

        public function attributes()
        {
            return [
                'name' => 'Indicator Name',
                'unit_rank_id' => 'Unit Rank',
                'unit_id' => 'Unit',
                'indicator_group_id' => 'Indicator Group',
                'indicator_type_id' => 'Indicator Type',
                'indicator_unit_of_measure_id' => 'Indicator Unit of Measure',
                'indicator_weight' => 'Indicator Weight',
                'indicator_target' => 'Indicator Target',
                'indicator_achivement' => 'Indicator Achivement',
                'remarks' => 'Remarks',
                'order' => 'Order',
            ];
        }

        //filters
        public function filters()
        {
            return [
                'name' => 'trim|escape|upcase',
                'unit_rank_id' => 'trim|escape',
                'unit_id' => 'trim|escape',
                'indicator_group_id' => 'trim|escape',
                'indicator_type_id' => 'trim|escape',
                'indicator_unit_of_measure_id' => 'trim|escape',
                'indicator_weight' => 'trim|escape',
                'indicator_target' => 'trim|escape',
                'indicator_achivement' => 'trim|escape',
                'remarks' => 'trim|escape',
                'order' => 'trim|escape',
            ];
        }


}
