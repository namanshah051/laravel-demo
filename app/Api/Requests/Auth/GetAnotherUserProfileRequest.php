<?php

namespace App\Api\Requests\Auth;

use App\Api\Requests\Request;

class GetAnotherUserProfileRequest extends Request
{
    public function rules()
    {
        return [
            'user_id' => 'required',
        ];
    }
}
