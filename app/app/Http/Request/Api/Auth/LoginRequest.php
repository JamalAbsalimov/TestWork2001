<?php

namespace App\Http\Request\Api\Auth;

use App\Http\Request\Api\ApiRequest;

class LoginRequest extends ApiRequest
{
    /**
     * @return true
     */
    public function authorize(): true
    {
        return true;
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'string', 'max:255'],
            'password' => ['string', 'max:255', 'required'],
        ];
    }

}
