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
            'order'                         => ['required','numeric','min:1'],
            'indicator_weight'              => ['required','numeric','min:1'],
            'indicator_type_id'             => ['required','numeric','min:1'],
            'indicator_unit_of_measure_id'  => ['required','numeric','min:1'],
            'master_indicator_id'           => ['required','numeric','min:1'],
            'is_backlog_indicator'          => ['required','boolean'],
            

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'name.min' => 'The Indicator name is too short',
            'order.required' => 'An order is required',
            'order.min' => 'The Indicator order is too short',
            'indicator_weight.required' => 'An indicator weight is required',
            'indicator_weight.min' => 'The Indicator weight is too short',
            'indicator_type_id.required' => 'An indicator type is required',
            'indicator_type_id.min' => 'The Indicator type is too short',
            'indicator_unit_of_measure_id.required' => 'An indicator unit of measure is required',
            'master_indicator_id.required' => 'A master indicator is required',
            

        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Indicator Name',
            'order' => 'Indicator Order',
            'indicator_weight' => 'Indicator Weight',
            'indicator_type_id' => 'Indicator Type',
            'indicator_unit_of_measure_id' => 'Indicator Unit of Measure',
            'master_indicator_id' => 'Master Indicator',
            'is_backlog_indicator' => 'Is Backlog Indicator',
        ];
    }

    //filters
    public function filters()
    {
        return [
            'name' => 'trim|escape|upcase',
            'order' => 'trim|escape',
            'indicator_weight' => 'trim|escape',
            'indicator_type_id' => 'trim|escape',
            'indicator_unit_of_measure_id' => 'trim|escape',
            'master_indicator_id' => 'trim|escape',
        ];
    }
}
