<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDonationRequest extends FormRequest
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
            'amount' => 'required|integer|min:1000',
            'as_anonymous' => 'nullable',
            'name' => [Rule::requiredIf(auth()->guest()), 'min:3', 'max:255'],
            'email' => [Rule::requiredIf(auth()->guest()), 'email:dns'],
            'comment' => 'nullable|min:3|max:255',
        ];
    }
}
