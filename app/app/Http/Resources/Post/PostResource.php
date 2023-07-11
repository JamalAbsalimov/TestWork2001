<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\Base\ApiResource;
use App\Models\Post\Post;
use Illuminate\Http\Request;

/**
 * @mixin Post
 */
class PostResource extends ApiResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'status' => $this->status,
            'createdAt' => $this->created_at->format('d.m.Y H:i')
        ];
    }

}
