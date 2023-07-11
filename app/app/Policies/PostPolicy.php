<?php

namespace App\Policies;

use App\Models\Post\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create posts');
    }

    /**
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function update(User $user, Post $post): bool
    {
        return $this->isAuthor($user, $post);
    }

    /**
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function delete(User $user, Post $post): bool
    {
        return $this->isAuthor($user, $post);
    }

    /**
     * @param User $user
     * @param Post $post
     * @return bool
     */
    private function isAuthor(User $user, Post $post): bool
    {
        return $user->id === $post->author_id;
    }
}
