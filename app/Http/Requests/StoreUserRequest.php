<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request
     *
     * @return boolean
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return app('router')->getCurrentRoute()->getName() == 'updateUser' ? [
            'name' => 'required|regex:/^[a-zA-Z][a-zA-Z\\s]+$/',
            'email' => 'required|email',
        ] : [
                'name' => 'required|regex:/^[a-zA-Z][a-zA-Z\\s]+$/',
                'email' => 'required|email',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ];
    }

    /**
     * Validation message for name regex
     *
     * @return array
     */
    public function messages(): array
    {
        return ["name.regex" => "Name can only contain alphabets and space"];
    }

}
