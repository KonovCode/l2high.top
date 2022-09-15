<?php

namespace App\Http\Requests;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class BuyStatusRequest extends FormRequest
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
            'buy_service_id' => ['required', Rule::exists('services', 'id')],
            'project_id' => ['required', Rule::exists('projects', 'id')->where('user_id', Auth::user()->id)],
            'balance' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'balance.required' => 'Ошибка!. Не достаточно средств',
            'is_state.required' => 'У вас уже есть top статус!'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'balance' => (Auth::user()->balance >= Service::all()->find($this->buy_service_id)->price ? Auth::user()->balance : null),
        ]);
    }

}
