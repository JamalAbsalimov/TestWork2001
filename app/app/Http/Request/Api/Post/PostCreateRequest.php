<?php

namespace App\Http\Request\Api\Post;


use App\Http\Request\Api\ApiRequest;

class PostCreateRequest extends ApiRequest
{
    /**
     * @return true
     */
    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required'],
            'content' => ['string'],
        ];
    }
}
