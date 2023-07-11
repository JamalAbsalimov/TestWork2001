<?php

namespace App\Http\Resources\Base;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiResource extends JsonResource
{
    public function __construct($resource = null)
    {
        parent::__construct($resource);
    }

    /**
     * @param $request
     * @return bool[]
     */
    public function with($request): array
    {
        return [
            'success' => $this->success,
        ];
    }

    public bool $success = true;

    public function setStatusCode(int $statusCode): JsonResponse
    {
        return $this->response()->setStatusCode($statusCode);
    }


}
