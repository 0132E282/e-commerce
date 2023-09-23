<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $validate = [
            'name' => 'required|string|min:5|max:50',
            'email' => 'required|email|unique:users|min:5|max:40',
            'password' => 'required|min:5|max:20',
            'roles' => 'required'
        ];
        if ($this->method() === 'PUT') {
            unset($validate['email']);
            
        }
        return $validate;
    }
}
