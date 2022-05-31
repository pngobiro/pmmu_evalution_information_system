<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'pj_number' => ['required', 'string', 'max:255', 'unique:users'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'designation' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'pj_number.required' => 'Please enter PJ Number',
            'first_name.required' => 'Please enter First Name',
            'last_name.required' => 'Please enter Last Name',
            'email.required' => 'Please enter Email',
            'password.required' => 'Please enter Password',
            'designation.required' => 'Please enter Designation',
        ];
    }

    public function attributes()
    {
        return [
            'pj_number' => 'PJ Number',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'designation' => 'Designation',
        ];
    }

    public function response(array $errors)
    {
        return redirect()->back()->withErrors($errors)->withInput();
    }

    public function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();

        return $validator;
    }



}
