<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeRequest extends FormRequest
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
            'name' => 'required|max:200',
            'type_id' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Il nome è essere obbligatorio',
            'name.max' => 'Il nome è di massimo :max caratteri',
        ];
    }
}
