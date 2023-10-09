<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'visitor_id' => 'required|integer|exists:visitors,id',
            'user_id' => 'required|integer|exists:users,id',
            'case_number' => 'required|string|max:255|unique:court_cases',
            'category_id' => 'required|integer|exists:categories,id',
            'article_id' => 'required|integer|exists:articles,id',
            'case_production_number' => 'required|string|max:255|unique:court_cases',
            'google_drive_link' => 'nullable|url',
            'comment' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'visitor_id.required' => 'Поле "Клієнт" є обов\'язковим.',
            'user_id.required' => 'Поле "Адвокат" є обов\'язковим.',
            'case_number.required' => 'Поле "Номер справи" є обов\'язковим.',
            'case_number.unique' => 'Справа с таким номером вже існує.',
            'category_id.required' => 'Поле "Категорія" є обов\'язковим.',
            'article_id.required' => 'Поле "Стаття" є обов\'язковим.',
            'case_production_number.required' => 'Поле "Номер провадження" є обов\'язковим.',
            'case_production_number.unique' => 'Справа с таким номером вже існує.',
            'google_drive_link.url' => 'Поле "Посилання на матеріали справи" повинно бути посиланням URL.',
        ];
    }
}
