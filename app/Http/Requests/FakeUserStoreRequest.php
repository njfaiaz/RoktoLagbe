<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FakeUserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'fake_user_name' => ['required', 'string', 'max:255'],
            'fake_user_phone_number' => ['required', 'string', 'size:11', 'regex:/^01[0-9]{9}$/'],
            'fake_user_details' => ['required', 'string', 'max:3000'],
        ];
    }
}
