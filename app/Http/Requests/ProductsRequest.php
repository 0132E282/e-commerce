<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function passedValidation()
    {
        $filter = [
            'quantity' => $this->quantity,
            'price' => $this->price,
            'category' => $this->category,
            'created' => $this->created,
            'brand' => $this->brand,
        ];
        $this->merge([
            'filter' => $filter,
            'order' => $this->order,
            'by' => $this->by,
            'search' => $this->search,
            'created_at' => $this->created
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [];
        if (!$this->isMethod('get')) {
            $rules =  [
                'name_product' => ['required'],
                'feature_image' => ['image', 'mimes:jpg,jpeg,png,bmp,gif,svg,webp'],
                'brand' => ['required'],
                'category' => ['required'],
            ];
        }
        if ($this->isMethod('post')) {
            $rules['feature_image'][] = 'required';
        }
        return $rules;
    }
    public function  messages(): array
    {
        return [
            'name_product.required' => 'tên sản phẩm không được để trống',
            'feature_image.required' => 'ảnh đại diện không được để trống',
            'feature_image.image' => 'phải là hình ảnh',
            'brand.required' => 'thương hiệu không được để trống',
            'category' => 'danh mục sản phẩm không được để trống',

        ];
    }
}
