<?php

namespace App\Http\Requests\Transport;

use Illuminate\Foundation\Http\FormRequest;

class TransportStoreRequest extends FormRequest
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
            'company' => 'required|string',
            'price' => 'required|numeric',
            'coefficient' => 'required|numeric'
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
            'company.required' => 'Parameter company is required!',
            'price.required' => 'Parameter price is required!',
            'price.numeric' => 'The parameter price must be a numeric!',
            'coefficient.required' => 'Parameter coefficient is required!',
            'coefficient.numeric' => 'The parameter coefficient must be a numeric!'
        ];
    }

}
