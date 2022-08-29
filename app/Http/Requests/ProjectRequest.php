<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ProjectRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:24', 'min:3'],
            'chronicles' => ['required', 'string', 'max:24'],
            'rates' => ['required', 'string', 'min:1', 'max:5'],
            'date_open' => ['required', 'date'],
            'website' => ['required', 'string', 'min:4', 'max:199'],
            'status' => ['nullable', 'string', 'min:3', 'max:20'],
            'status_term' => ['nullable', 'date'],
            'premium' => ['nullable', 'boolean'],
            'premium_term' => ['nullable', 'date'],
            'user_id' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'status_term' => ($this->status !== 'default' ? Carbon::now()->addDays(30)->toDateString() : null),
            'premium_term' => ($this->premium !== false ? Carbon::now()->addDays(30)->toDateString() : null),
        ]);
    }
}
