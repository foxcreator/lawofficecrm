<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'unique:categories,name|max:25'
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Ця категорія вже існує.',
            'name.max' => 'Назва категорії не повинна бути довше 25 символів.',
        ];
    }
}
