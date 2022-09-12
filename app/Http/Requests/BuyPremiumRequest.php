<?php

namespace App\Http\Requests;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class BuyPremiumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'buy_premium_id' => ['required', Rule::exists('services', 'id')],
            'project_id' => ['required', Rule::exists('projects', 'id')->where('user_id', Auth::user()->id)],
            'premium_state' => ['required'],
            'balance' => ['required'],
            'limit' => ['required', 'integer', 'min:0', 'max:7'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'balance' => (Auth::user()->balance >= Service::all()->find($this->buy_premium_id)->price ? Auth::user()->balance : null),
            'limit' => (count(Project::all()->where('premium', 1))),
        ]);
    }

//    public function messages()
//    {
//        return [
//            'buy_p'
//        ]
//    }
}
