<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRankCategoryRequest extends FormRequest
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
            'name' => 'required|unique:rank_categories,name',
            'unit_rank_id' => 'required,numeric,min:1',
            'description' => 'required',
    ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.unique' => 'The name has already been taken.',
            'description.required' => 'The description field is required.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Rank Category Name',
            'description' => 'Rank Category Description',
            'unit_rank_id' => 'Rank Category Unit Rank',
        ];
    }



    public function response(array $errors)
    {
        return redirect()->back()->withErrors($errors)->withInput();
    }






 

}
