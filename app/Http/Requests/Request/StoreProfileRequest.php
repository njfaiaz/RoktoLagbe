<?php

namespace App\Http\Requests\Request;

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
            'phone_number' => 'required|digits:11',
            'previous_donation_date' => 'required|date',
            'gender' => 'required|in:Male,Female'

        ];
    }
}
