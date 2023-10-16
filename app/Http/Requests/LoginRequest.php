<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => 'exclude_with:email|required_without:email|string|max:200|regex:/[a-zA-Z0-9._!-]+/',
            'email' => 'exclude_with:username|required_without:username|email|max:200',
            'password' => ['required', 'string', 'max:200', Password::min(8)->letters()->mixedCase()->numbers()],
        ];
    }
}
