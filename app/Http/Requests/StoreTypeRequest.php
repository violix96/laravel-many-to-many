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
            'type_id' => ['required', 'integer', 'exists:type,id']
        ];
    }

    public function messages()
    {
        return [
            'type_id' => 'Il campo type_id è obbligatorio e deve essere specificato.',
        ];
    }
}
