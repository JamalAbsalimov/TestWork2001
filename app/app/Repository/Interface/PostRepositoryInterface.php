<?php

namespace App\Repository\Interface;

use App\Models\Post\Post;
use App\Models\User;

interface PostRepositoryInterface
{
    public function add(array $attributes, User $author);

    public function edit(array $attributes, Post $post);
}
