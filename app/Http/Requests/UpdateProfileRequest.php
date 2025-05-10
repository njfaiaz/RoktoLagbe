<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $userId = auth()->id();
        return [
            'phone_number' => [
                'required',
                'string',
                'size:11',
                'regex:/^01[0-9]{9}$/',
                Rule::unique('profiles', 'phone_number')->ignore($userId, 'user_id')
            ],
            'gender'                 => 'required|string|max:20',
            'blood_id'               => 'required|numeric|exists:bloods,id',
            'previous_donation_date' => 'required|date',
            'image'                  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ];
    }
}
