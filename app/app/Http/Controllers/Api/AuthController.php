<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Request\Api\Auth\LoginRequest;
use App\Http\Resources\Auth\TokenResource;
use App\Http\Resources\Base\SuccessResource;
use Illuminate\Auth\AuthenticationException;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param LoginRequest $request
     * @return TokenResource
     * @throws AuthenticationException
     */
    public function login(LoginRequest $request): TokenResource
    {
        $token = auth('api')->attempt($request->validated());

        if (!$token) {
            throw new AuthenticationException('Unauthenticated.');
        }

        return new TokenResource((object)['token' => $token]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return SuccessResource
     */
    public function logout(): SuccessResource
    {
        auth('api')->logout();

        return SuccessResource::make(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return TokenResource
     */
    public function refresh(): TokenResource
    {
        $token = auth()->refresh();
        return new TokenResource((object)['token' => $token]);
    }
}
