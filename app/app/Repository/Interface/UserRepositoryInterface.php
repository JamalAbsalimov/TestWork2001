<?php

namespace App\Repository\Interface;

use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function all(): Collection;
}
