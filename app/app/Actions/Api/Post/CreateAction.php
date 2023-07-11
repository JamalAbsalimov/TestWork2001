<?php

namespace App\Actions\Api\Post;

use App\Models\Post\Post;
use App\Repository\Interface\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Lorisleiva\Actions\Concerns\AsObject;

class CreateAction
{
    use AsObject;

    public function __construct(
        private readonly PostRepositoryInterface $repository
    )
    {
    }

    /**
     * @param array $data
     * @return Post
     */
    public function handle(array $data): Model
    {
        return $this->repository->add($data, auth('api')->user());
    }
}
