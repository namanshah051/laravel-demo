<?php

namespace App\Api\Requests\Auth;

use App\Api\Requests\Request;

class UpdateRegisterRequest extends Request
{
    public function rules()
    {
        return [
			// 'full_name'   => 'required|string|min:6',
			// 'mobile'      => 'required',
			// 'latitude'    => 'required',
			// 'longitude'   => 'required',
			// 'birth_date'    => 'required',
			
        ];  
    }
}

