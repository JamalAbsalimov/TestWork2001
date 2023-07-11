<?php

namespace App\Repository\Eloquent;

use App\Models\Post\Post;
use App\Models\User;
use App\Repository\Interface\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class PostRepository implements PostRepositoryInterface
{

    /**
     * @param array $attributes
     * @param User $author
     * @return Model
     */
    public function add(array $attributes, User $author): Model
    {
        $post = new Post($attributes);

        $post->author()->associate($author)->save();

        return $post->fresh();

    }

    /**
     * @param array $attributes
     * @param Post $post
     * @return Post
     */
    public function edit(array $attributes, Post $post): Post
    {
        $post->update($attributes);

        return $post->fresh();
    }
}
