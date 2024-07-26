<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRequest extends FormRequest
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
            'title' => ['required'],
            'type_id' => ['required', 'integer', 'exists:types,id'],
            'technologies' => ['nullable', 'exists:technologies,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'type_id.required' => 'Il campo type_id è obbligatorio e deve essere specificato.',
            'type_id.integer' => 'Il campo type_id deve essere un numero intero.',
            'type_id.exists' => 'Il campo type_id deve esistere nella tabella types.',
        ];
    }
}
