<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVisitorRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {

        $status = $this->input('visitor_status');

        $rules = [
            'visitor_status' => 'required|in:0,1',
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string',
            'surname' => 'required|string',
            'father_name' => 'required|string',
            'birthdate' => 'required|date',
            'phone' => 'required|string',
        ];

        if ($status == 1) {
            $rules += [
                'tin_code' => 'required|digits:10|unique:visitors,tin_code',
                'passport_number' => 'required|digits:4,10|unique:visitors,passport_number',
                'passport_issued_by' => 'required|string',
                'passport_when_issued' => 'required|date',
                'address' => 'required|string',
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'visitor_status.required' => 'Поле статус обов\'язкове до заповнення.',
            'visitor_status.in' => 'Невірний формат статусу.',

            'email.required' => 'Поле Email обов\'язкове до заповнення.',
            'email.email' => 'Поле Email повинне бути дійсною електронною адресою.',
            'email.unique' => 'Користувач з таким Email вже існує.',

            'name.required' => 'Поле Ім\'я обов\'язкове до заповнення.',
            'name.string' => 'Поле Ім\'я повинно бути рядком.',

            'surname.required' => 'Поле Прізвище обов\'язкове до заповнення.',
            'surname.string' => 'Поле Прізвище повинно бути рядком.',

            'father_name.required' => 'Поле По-батькові обов\'язкове до заповнення.',
            'father_name.string' => 'Поле По-батькові повинно бути рядком.',

            'birthdate.required' => 'Поле Дата народження обов\'язкове до заповнення.',
            'birthdate.date' => 'Поле Дата народження повинно бути датою.',

            'phone.required' => 'Поле Телефон обов\'язкове до заповнення.',
            'phone.string' => 'Поле Телефон повинно бути рядком.',

            'tin_code.required_if' => 'Поле ІПН обов\'язкове до заповнення для клієнта.',
            'tin_code.digits' => 'Поле ІПН повинно містити 10 цифр.',
            'tin_code.unique' => 'Користувач з таким ІПН вже існує.',

            'passport_number.required_if' => 'Поле Номер паспорта обов\'язкове до заповнення для клієнта.',
            'passport_number.digits' => 'Поле Номер паспорта повинно містити 10 цифр.',
            'passport_number.unique' => 'Користувач з таким номером паспорта вже існує.',

            'passport_issued_by.required_if' => 'Поле Кім виданий обов\'язкове до заповнення для клієнта.',
            'passport_issued_by.string' => 'Поле Кім виданий повинно бути рядком.',

            'passport_when_issued.required_if' => 'Поле Дата видачі обов\'язкове до заповнення для клієнта.',
            'passport_when_issued.date' => 'Поле Дата видачі повинно бути датою.',

            'address.required_if' => 'Поле Адреса обов\'язкове до заповнення для клієнта.',
            'address.string' => 'Поле Адреса повинно бути рядком.',
        ];
    }
}
