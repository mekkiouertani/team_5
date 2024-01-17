<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCharacterRequest extends FormRequest
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
            'name' => 'required|max:200|min:10',
            'type_id' => 'required|integer',
            'attack' => 'required|integer',
            'defence' => 'required|integer',
            'speed' => 'required|integer',
            'life' => 'required|integer',
            'image' => ['nullable', 'max:5120'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome deve essere obbligatorio',
            'name.max' => 'Il nome deve avere :max caratteri',
            'name.min' => 'Il nome deve avere almeno :min caratteri',
            'attack.required' => 'l\'attacco deve essere obbligatorio',
            'defence.required' => 'la difesa deve essere obbligatoria',
            'speed.required' => 'la velocita deve essere obbligatoria',
            'life.required' => 'la vita deve essere obbligatoria',
            'image.max' => 'l\'immagine deve essere :max MB',
        ];
    }
}
