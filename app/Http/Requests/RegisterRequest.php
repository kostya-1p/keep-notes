<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:200|alpha',
            'middle_name' => 'required|string|max:200|alpha',
            'last_name' => 'required|string|max:200|alpha',
            'username' => 'required|string|max:200|regex:/^[a-zA-Z0-9._!-]*$/|unique:users,username',
            'email' => 'required|email|max:200|unique:users,email',
            'password' => [
                'required',
                'string',
                'max:200',
                'confirmed',
                Password::min(8)->letters()->mixedCase()->numbers()
            ],
        ];
    }
}
