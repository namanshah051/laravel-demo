<?php

namespace App\Api\Requests\Auth;

use App\Api\Requests\Request;

class RegisterRequest extends Request
{
    public function rules()
    {
        return [
			'email'        => 'required|string|email|max:255',
			'name'         => 'required|string',
			'password'     => 'required|string|min:8',
			'device_token' => 'required',
			'device_type'  => 'required',
		];
    }
}
