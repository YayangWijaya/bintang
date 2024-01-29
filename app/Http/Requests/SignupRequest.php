<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'ktp_number' => 'required|digits:16',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'pob' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'status' => 'required',
            'cv' => 'required|file|mimes:pdf|max:5120',
            'photo' => 'required|file|mimes:jpg,jpeg,png|max:5120',
            'referrer' => 'nullable'
        ];
    }
}
