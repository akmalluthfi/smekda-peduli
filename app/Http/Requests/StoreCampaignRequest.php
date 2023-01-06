<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCampaignRequest extends FormRequest
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
            'title' => 'required|min:3|max:255',
            'image' => 'required|file|image|max:1024',
            'target_amount' => 'required|integer|min:10000|max:100000000',
            'duration' => 'required|date|after:tomorrow',
            'description' => 'required'
        ];
    }
}
