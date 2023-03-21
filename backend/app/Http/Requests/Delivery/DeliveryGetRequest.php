<?php

namespace App\Http\Requests\Delivery;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryGetRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'sourceKladr' => 'required|string',
            'targetKladr' => 'required|string',
            'weight' => 'required|numeric'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'sourceKladr.required' => 'Parameter sourceKladr is required!',
            'targetKladr.required' => 'Parameter targetKladr is required!',
            'weight.required' => 'Parameter weight is required!',
            'weight.float' => 'The parameter weight must be a numeric!'
        ];
    }
}
