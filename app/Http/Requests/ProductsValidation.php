<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsValidation extends FormRequest
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

        $rules =  [
            'name_product' => ['required'],
            'price_product' => ['required', 'numeric'],
            'feature_image' => ['image', 'mimes:web,jpg,png'],
        ];
        if ($this->method() === 'POST') {
            $rules['feature_image'] = ['required', 'image', 'mimes:web,jpg,png'];
        }

        return $rules;
    }
    public function  messages(): array
    {
        return [
            'name_product.required' => 'tên sản phẩm không được để trống',
            'price_product.required' => 'giá sản phẩm không được để trống',
            'price_product.numeric' => 'giá sản phẩm phải là số',
            'feature_image.required' => 'ảnh nền sản phảm không được để trong',
        ];
    }
}
