<?php

namespace App\Http\Resources\Auth;

use App\Http\Resources\Base\ApiResource;
use Illuminate\Http\Request;

/**
 * @property  string $token
 */
class TokenResource extends ApiResource
{

    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'access_token' => $this->token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ];
    }
}
