<?php

namespace App\Actions\Api\Post;

use App\Models\Post\Post;
use App\Repository\Interface\PostRepositoryInterface;
use Lorisleiva\Actions\Concerns\AsObject;

class UpdateAction
{
    use AsObject;

    public function __construct(
        private readonly PostRepositoryInterface $repository
    )
    {
    }

    /**
     * @param Post $post
     * @param array $data
     * @return Post
     */
    public function handle(Post $post, array $data): Post
    {
        return $this->repository->edit($data, $post);
    }

}
