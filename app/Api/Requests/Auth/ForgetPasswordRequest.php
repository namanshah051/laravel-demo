<?php

namespace App\Api\Requests\Auth;

use App\Api\Requests\Request;

class ForgetPasswordRequest extends Request
{
    public function rules()
    {
        return [
            'email' => 'required|string|email|max:50',
        ];
    }
}
