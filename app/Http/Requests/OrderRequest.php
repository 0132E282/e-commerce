<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function passedValidation(): void
    {
        $order = [
            'users' => 'user_id',
            'created' => 'created_at',
            'area' => 'address',
            'customer' => 'fullname',
            'email' => 'email',
            'price' => 'price',
            'payment' => 'payment',
            'paid' => 'paid_at',
            'phone' => 'phone',
        ];
        $this->merge([
            'order' => $order[$this->order] ?? null,
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'phone' => ['required', 'phone:VN'],
            // 'fullname' => ['required'],
            // 'email' => ['email']
        ];
    }
}
