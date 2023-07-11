<?php

namespace App\Exceptions;

use App\Http\Resources\Base\ErrorResource;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * @param $request
     * @param Throwable $e
     * @return JsonResponse
     * @throws Throwable
     */
    public function render($request, Throwable $e): Response
    {
        if ($request->is('api/*')) {
            $error = ErrorResource::make()
                ->setMessage($e->getMessage());

            if ($e instanceof AuthenticationException) {
                return $error->setStatusCode(Response::HTTP_UNAUTHORIZED);
            }

            if ($e instanceof ModelNotFoundException) {
                return $error->setStatusCode(Response::HTTP_NOT_FOUND);
            }

            if ($e instanceof AuthorizationException) {
                return $error->setStatusCode(Response::HTTP_FORBIDDEN);
            }

            return $error->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return parent::render($request, $e);
    }
}
