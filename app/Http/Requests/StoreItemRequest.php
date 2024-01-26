<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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

            'slug' => 'max:200',
            'category' => 'required|max:100',
            'type' => 'required|max:100',
            'weight' => 'required',
            'cost' => 'required|max:20',
            'image' => ['nullable', 'max:5120'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'nome è richiesto',
            'name.max' => 'il nome deve essere massimo :max caratteri',
            'category.required' => 'la categoria è richiesta',
            'category.max' => 'la categoria deve essere massimo :max caratteri',
            'type.required' => 'il tipo è richiesto',
            'type.max' => 'il tipo deve essere massimo :max caratteri',
            'weight.required' => 'il peso deve essere inserito',

            'cost.required' => 'il costo è richiesto',
            'cost.max' => 'il costo deve avere massimo :max caratteri',
            'image.max' => 'l\'immagine deve essere :max MB',
        ];
    }
}
