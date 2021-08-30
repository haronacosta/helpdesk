<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|min:2|max:55',
            'last_name' => 'required|min:4|max:55',
            'username' => 'required|min:4|max:50|unique:users',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ];
    }



    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => ':attribute is required',
            'name.min' => 'The :attribute is invalid',
            'name.max' => 'The :attribute is invalid',
            'last_name.required' => ':attribute is required',
            'last_name.min' => 'The :attribute is invalid',
            'last_name.max' => 'The :attribute is invalid',
            'username.required' => ':attribute is required',
            'username.min' => 'The :attribute is invalid',
            'username.max' => 'The :attribute is invalid',
            'username.unique' => 'The :attribute is already taken',
            'email.email' => 'The :attribute is invalid',
            'email.unique' => 'The :attribute is already taken',
            'password.required' => ':attribute is required',
            'password.confirmed' => ':attribute do not match'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Name',
            'last_name' => 'Last name',
            'email' => 'email address',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }
}
