<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title' => 'required',
            'image_url' => ['image', 'mimes:jpg,jpeg,png,bmp,gif,svg,webp']
        ];
        if ($this->isMethod('post')) {
            $validate['image_url'][] = 'required';
        }
        return $validate;
    }
    public function messages()
    {
        return [
            'title.required' => 'tiêu đề không được để trống',
            'image_url.required' => 'ảnh không đươc để trống',
            'image_url.image' => 'phải là ảnh',
            'image_url.mimes' => 'ảnh phải có đuôi jpg,jpeg,png,bmp,gif,svg,webp',
        ];
    }
}
