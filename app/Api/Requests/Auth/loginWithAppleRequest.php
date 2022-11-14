<?php

namespace App\Api\Requests\Auth;

use App\Api\Requests\Request;

class loginWithAppleRequest extends Request
{
    public function rules()
    {
        return [
			//'email'        => 'required|string|email|max:255',
			'apple_id'     => 'required',
			'device_token' => 'required',
			'device'       => 'required',
        ];
    }
}
