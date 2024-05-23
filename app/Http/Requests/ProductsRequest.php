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
        if ($this->isMethod('post')) {
            $rules =  [
                'name_product' => ['required'],
            ];
        }
        return $rules;
    }
    public function  messages(): array
    {
        return [
            'name_product.required' => 'tên sản phẩm không được để trống',
        ];
    }
}
