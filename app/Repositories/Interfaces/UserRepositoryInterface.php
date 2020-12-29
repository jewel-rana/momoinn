<?php


namespace App\Repositories\Interfaces;


use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function all() : Collection;
}
