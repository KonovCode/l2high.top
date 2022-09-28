<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class BuyBannerRequest extends FormRequest
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
            'name_project' => ['required', 'string', 'min:3', 'max:20'],
            'url' => ['required', 'string'],
            'img' => ['required', 'image', 'mimes:jpg', 'max:50000'],
            'buy_term' => ['required', 'integer', Rule::exists('services', 'id')],
            'user_id' => ['required', Rule::exists('users', 'id')->where('id', Auth::user()->id)],
            'banner_id' => ['required', Rule::exists('banners', 'id')->where('reserved', 0)],
        ];
    }
}
