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


    
        ];
    }

    public function messages()
        {
            return [
                'name.required' => 'A name is required',
                'name.min' => 'The Indicator name is too short',
                'description.required' => 'A description is required',
                'description.min' => 'The Indicator description is too short',
                'order.required' => 'An order is required',
                'order.numeric' => 'The order is not valid',
                'order.min' => 'The order is too short',
            
                
            
            ];
        }


        public function attributes()
        {
            return [
                'name' => 'Indicator Group Name',
                'description' => 'Indicator Group Description',
                'order' => 'Indicator Group Order',
                'unit_rank_id' => 'Indicator Group Unit Rank',
                'financial_year_id' => 'Indicator Group Financial Year',
                'rank_category_id' => 'Indicator Group Rank Category',
            ];
        }

        public function response(array $errors)
        {
            return redirect()->back()->withErrors($errors)->withInput();
        }
    
        





}
