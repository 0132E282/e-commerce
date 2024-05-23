<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

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
            'name' =>  ['required', 'string', 'min:5', 'max:50'],
            'email' => ['required', 'email', 'min:5', 'max:40'],
        ];
        if (Route::currentRouteName() == 'admin.users.create') {
            $validate['email'] = [...$validate['email'], 'unique:users'];
            $validate['password'] = ['min:5', 'max:50', 'required'];
        }
        return $validate;
    }
    public function messages(): array
    {

        return [
            'name.required' => 'Tên Người dùng không được để trống',
            'name.string' => 'người dùng phải là chuổi',
            'name.min' => 'tên người dùng phải có ích nhất 5 ký tự và tối đa 50 ky tư',
            'name.max' => 'tên người dùng phải có ích nhất 5 ký tự và tối đa 50 ky tư',
            'email.required' => 'Email không được để trống',
            'email.email' => 'phải là email',
            'email.unique' => 'email đã được đăng ký',
            'email.min' => 'email phải có trên 5 ký tự và tối đã 40 ký tự',
            'email.max' => 'email phải có trên 5 ký tự và tối đã 40 ký tự',
        ];
    }
}
