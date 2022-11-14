<?php

namespace App\Api\Requests\Auth;

use App\Api\Requests\Request;

class LoginRequest extends Request
{
    public function rules()
    {
        return [
				'email'        => 'required|string|email|max:255',
				'password'     => 'required|string|min:8',
				'device_token' => 'required',
				'device_type'  => 'required',
        ];
    }
}
