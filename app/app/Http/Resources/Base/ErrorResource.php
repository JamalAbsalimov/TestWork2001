<?php

namespace App\Http\Resources\Base;

use Illuminate\Http\Request;

class ErrorResource extends ApiResource
{
    public bool $success = false;

    public ?string $message = null;
    public ?array $errors = [];

    public ?string $trace = null;


    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'message' => $this->message,
            'errors' => $this->errors
        ];
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     *
     * @return ErrorResource
     */
    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param array|null $errors
     *
     * @return ErrorResource
     */
    public function setErrors(?array $errors): self
    {
        $this->errors = $errors;

        return $this;
    }

}
