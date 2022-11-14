<?php

namespace App\Api\Requests\Auth;

use App\Api\Requests\Request;

class SocialRegisterRequest extends Request
{
    public function rules()
    {
       return [
			'provider'     => 'required',
			'social_token' => 'required',
			'device_token' => 'required',
			'device'       => 'required',
        ];
    }
}
