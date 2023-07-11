<?php

namespace App\Http\Resources\Base;

use Illuminate\Http\Request;

class SuccessResource extends ApiResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
