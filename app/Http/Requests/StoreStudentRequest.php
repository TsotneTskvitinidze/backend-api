<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|min:2|max:30',
            'last_name' => 'required|string|min:2|max:30',
            'email' => 'required|email|unique:students',
            'identifier' => 'required|unique:students',
            'phone' => 'required|string|min:9|max:30',
            'avatar' => 'required|mimes:jpg,jpeg,png,webp',
            'visible' => 'required|string'
        ];
    }
}
