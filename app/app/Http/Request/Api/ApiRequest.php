<?php

namespace App\Http\Request\Api;

use App\Http\Resources\Base\ErrorResource;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ApiRequest extends FormRequest
{
    public function failedValidation(Validator $validator): void
    {
        // все ошибки валидации
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            ErrorResource::make()
                ->setMessage('VALIDATION_ERROR')
                ->setErrors($errors)
                ->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY)
        );
    }


}
