<?php

namespace App\Api\Requests\Auth;

use App\Api\Requests\Request;

class UpdatePasswordRequest extends Request
{
    public function rules()
    {
        return [
            'old_password'    => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:new_password',
        ];
    }
}
