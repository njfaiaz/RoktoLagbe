<?php

namespace App\Http\Requests;

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
        return [
            'phone_number'           => 'required|string|max:20',
            'gender'                 => 'required|string|max:20',
            'blood_id'               => 'required|numeric|exists:bloods,id',
            'previous_donation_date' => 'required|date',
            'image'                  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
