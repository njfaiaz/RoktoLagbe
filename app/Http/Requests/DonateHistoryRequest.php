<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonateHistoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'blood_receiver_name' => 'required|string|max:255',
            'blood_receiver_number' => ['required', 'string', 'size:11', 'regex:/^01[0-9]{9}$/'],
            'blood_id' => 'required|exists:bloods,id',
            'donation_date' => 'required|date',
            'gender' => 'required|string|in:Male,Female',
            'district_id' => 'required|exists:districts,id',
            'upazila_id' => 'required|exists:upazilas,id',
            'union_id' => 'required|exists:unions,id',
            'patient_details' => 'required|string|max:1000',
        ];
    }
}
