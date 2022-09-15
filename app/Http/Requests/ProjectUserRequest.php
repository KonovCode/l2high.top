<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class ProjectUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $response = Gate::inspect('user');

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
            'website' => ['required', 'string', 'min:4', 'max:99', 'unique:projects'],
            'chronicles' => ['required', 'string', 'min:5', 'max:20'],
            'rates' => ['required', 'string', 'min:1', 'max:7'],
            'date_open' => ['required', 'date'],
            'user_id' => ['required', Rule::exists('users', 'id')->where('id', Auth::user()->id)],
            'count_control' => ['required', 'min:0', 'max:3', 'integer'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'count_control' => count(Project::all()->where('user_id', Auth::user()->id)),
        ]);
    }

    public function messages()
    {
        return [
            'title.required' => 'Укажите название проекта',
            'title.string' => 'Не коректный формат ввода!',
            'title.min' => 'Минимально допустимая длина 3 символа',
            'title.max' => 'Максимально допустимая длина 20 символов',
            'title.unique' => 'Проект уже добавлен (если вы являетесь администратором, свяжитесь с нами для дальнейшего сотрудничества)',

            'website.required' => 'Укажите ссылку на сайта',
            'website.string' => 'Не коректный формат ввода, пример ввода - https://l2high.top',
            'website.min' => 'Минимально допустимая длина 4 символа',
            'website.max' => 'Максимально допустимая длина 99 символов',
            'website.unique' => 'Проект уже добавлен (если вы являетесь администратором, свяжитесь с нами для дальнейшего сотрудничества)',

            'chronicles.required' => 'Ошибка! Поле Хроники обязательное!',
            'chronicles.string' => 'Ошибка! Не коректный формат ввода!',
            'chronicles.min' => 'Ошибка! Минимально допустимая длина 5 символа',
            'chronicles.max' => 'Ошибка! Максимально допустимая длина 20 символов',

            'rates.required' => 'Укажите рейты сервера - GVE, RvE или от 0.1 до 9999999',
            'rates.string' => 'Не коректный формат ввода! Поле принимает - GVE, RvE а так же числа от 0.1 до 9999999 ',
            'rates.max' => 'Вы привысели максимальное значение!',

            'date_open.required' => 'Укажите дату открытия',
            'date_open.date' => 'Не допустимый формат даты!',

            'count_control.max' => 'Максимальное количество проектов на акаунте - 4',
        ];
    }
}
