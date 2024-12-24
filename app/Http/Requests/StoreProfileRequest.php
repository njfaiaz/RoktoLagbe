<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'user_id' => 'required|unique:users,id',
            'phone_number' => 'required|digits:11|unique:profiles,phone_number',
            'previous_donation_date' => 'required|date',
            'blood_id' => 'required|string|exists:bloods,id',
            'gender' => 'required|string|in:male,female,other',

        ];
    }
}
