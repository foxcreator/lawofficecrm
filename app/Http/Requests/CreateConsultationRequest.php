<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateConsultationRequest extends FormRequest
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
    public function rules()
    {
        return [
            'visitor_id' => 'required|exists:visitors,id',
            'user_id' => 'required|exists:users,id',
            'consultation_date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'reception_id' => 'required|exists:receptions,id',
            'comment' => 'nullable|string|max:400',
        ];
    }

    public function messages()
    {
        return [
            'visitor_id.required' => 'Поле "Відвідувач" обов\'язкове до заповнення.',
            'visitor_id.exists' => 'Вибраний "Відвідувач" не існує.',
            'user_id.required' => 'Поле "Консультант" обов\'язкове до заповнення.',
            'user_id.exists' => 'Вибраний "Консультант" не існує.',
            'consultation_date.required' => 'Поле "Дата консультації" обов\'язкове до заповнення.',
            'consultation_date.date' => 'Поле "Дата консультації" повинно бути датою.',
            'category_id.required' => 'Поле "Категорія" обов\'язкове до заповнення.',
            'category_id.exists' => 'Вибрана "Категорія" не існує.',
            'reception_id.required' => 'Поле "Приймальня" обов\'язкове до заповнення.',
            'reception_id.exists' => 'Вибрана "Приймальня" не існує.',
            'comment.string' => 'Поле "Коментар" повинно бути текстовим рядком.',
            'comment.max' => 'Коментар повинен містити не більше ніж :max символів.',
        ];
    }
}
