<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormCarRequest extends FormRequest
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
            // a. Marca: entre 3 y 15 letras
            'brand' => ['required', 'string', 'min:3', 'max:15', 'regex:/^[A-Za-z]+$/'],

            // b. Modelo: entre 1 y 15 letras
            'model' => ['required', 'string', 'min:1', 'max:15', 'regex:/^[A-Za-z]+$/'],

            // c. Matrícula: 4 dígitos seguidos de 3 letras (ej: 1234ABC)
            'plate' => ['required', 'string', 'regex:/^\d{4}[A-Za-z]{3}$/'],
        ];
    }

    public function messages()
    {
        return [
            'brand.required' => 'The brand is required.',
            'brand.min' => 'The brand must be at least 3 letters long.',
            'brand.max' => 'The brand cannot be more than 15 letters long.',
            'brand.regex' => 'The brand can only contain letters.',

            'model.required' => 'The model is required.',
            'model.min' => 'The model must be at least 1 letter long.',
            'model.max' => 'The model cannot be more than 15 letters long.',
            'model.regex' => 'The model can only contain letters.',

            'plate.required' => 'The plate is required.',
            'plate.regex' => 'The plate must have 4 digits followed by 3 letters (e.g., 1234ABC).',
        ];
    }
}
