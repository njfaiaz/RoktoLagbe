<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class RequestAddress extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'district_id' => 'required|integer|exists:districts,id',
            'upazila_id'  => 'required|integer|exists:upazilas,id',
            'union_id'    => 'required|integer|exists:unions,id',
        ];
    }

    public function messages(): array
    {
        return [
            'district_id.required' => 'The district field is required.',
            'district_id.exists'   => 'The selected district is invalid.',
            'upazila_id.required'  => 'The upazila field is required.',
            'upazila_id.exists'    => 'The selected upazila is invalid.',
            'union_id.required'    => 'The union field is required.',
            'union_id.exists'      => 'The selected union is invalid.',
        ];
    }
}
