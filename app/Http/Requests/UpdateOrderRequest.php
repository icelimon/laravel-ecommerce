<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status' => 'required|string|max:1|in:P,A,D',
            'details' => 'required|array|min:1',
            'details.*.product_id' =>'required|numeric|exists:products,id',
            'details.*.quantity' =>'required|numeric',
            'details.*.unit_price' =>'required|numeric'
        ];
    }

    /**
     * Get the validation message that apply to the error response.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'details.required' => 'At least one item is required in the order.',
            'details.*.product_id.exists' => 'Invalid product ID.'
        ];
    }
}
