<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $response = Gate::inspect('admin');

        if ($response->allowed()) {
            return true;
        } else {
            return $response->message();
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:20', 'unique:projects'],
            'chronicles' => ['required', 'string', 'min:5', 'max:20'],
            'rates' => ['required', 'string', 'min:1', 'max:7'],
            'date_open' => ['required', 'date'],
            'website' => ['required', 'string', 'min:4', 'max:99', 'unique:projects'],
            'status' => ['string', 'min:3', 'max:7'],
            'status_term' => ['nullable', 'date'],
            'premium' => ['nullable', 'boolean'],
            'premium_term' => ['nullable', 'date'],
            'user_id' => ['nullable', Rule::exists('users', 'id')->where('role', 'admin')],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'status_term' => ($this->status !== 'default' ? Carbon::now()->addDays(30)->toDateString() : null),
            'premium_term' => ($this->premium !== 0 ? Carbon::now()->addDays(30)->toDateString() : null),
        ]);
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательное для заполнения',
            'title.string' => 'Это поле принимает только алфавитные и цифровые символы',
            'title.min' => 'Минимальное количество символов 3',
            'title.max' => 'Максимальное количество символов 20',
            'title.unique' => 'Токой проект уже существует',

            'chronicles.required' => 'Выберите хроники проекта',
            'chronicles.string' => 'Это поле принимает только алфавитные и цифровые символы',
            'chronicles.min' => 'Ошибка! Минимальное количество символов 5',
            'chronicles.max' => 'Ошибка! Максимальное количество символов 20',

            'rates.required' => 'Это поле обязательное для заполнения',
            'rates.string' => 'Это поле принимает только GVE RvR и числа от 0.1 до 9 999 999',

            'date_open.required' => 'Укажите дату открытия!',
            'date_open.date' => 'Ошибка неверная дата!',

            'website.required' => 'Это поле обязательное для заполнения',
            'website.string' => 'Недопустимое значение. Пример ввода - "https://l2high.top"',
            'website.min' => 'Минимальное количество символов 4',
            'website.max' => 'Максимальное количество символов 99',
            'website.unique' => 'Проект с таким адрес уже существует',

            'status.max' => 'Ошибка! Не коректное значение!',
            'status.min' => 'Ошибка! Не коректное значение!',

            'premium.boolean' => 'Ошибка! Не коректное значение!',

            'user_id.exists' => 'У вас нет прав нв это действие!',
            'user_id' => 'rule',
        ];
    }
}
