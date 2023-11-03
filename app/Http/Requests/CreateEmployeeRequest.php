<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return auth()->check();
//        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirmPassword' => 'required|same:password',
            'name' => 'required|min:3',
            'surname' => 'required|min:4',
            'birthdate' => 'required|date',
            'phone' => 'required|regex:/^\+\d{2}\(\d{3}\)\d{7}$/',
            'role' => 'required|in:0,1,2,3',
            'gender' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Поле "Email" обов\'язкове для заповнення.',
            'email.email' => 'Будь ласка, введіть коректну адресу електронної пошти.',
            'email.unique' => 'Така адреса електронної пошти вже існує в системі.',
            'password.required' => 'Поле "Пароль" обов\'язкове для заповнення.',
            'password.min' => 'Пароль повинен містити щонайменше 6 символів.',
            'confirmPassword.required' => 'Поле "Підтвердження пароля" обов\'язкове для заповнення.',
            'confirmPassword.same' => 'Пароль та його підтвердження не співпадають.',
            'birthdate.required' => 'Поле "Дата народження" обов\'язкове для заповнення.',
            'birthdate.date' => 'Будь ласка, введіть коректну дату.',
            'phone.required' => 'Поле "Номер телефону" обов\'язкове для заповнення.',
            'phone.regex' => 'Будь ласка, введіть коректний номер телефону у форматі "+XX(XXX)XXXXXXX".',
            'role.required' => 'Будь ласка, оберіть роль.',
            'role.in' => 'Обрана неприпустима роль.',
            'gender.required' => 'Будь ласка, оберіть стать.',
            'gender.in' => 'Обрана неприпустима стать.',
        ];
    }

}
