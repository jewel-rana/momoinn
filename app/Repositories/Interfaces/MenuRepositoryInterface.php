<?php


namespace App\Repositories\Interfaces;


use Illuminate\Support\Collection;

interface MenuRepositoryInterface
{
    public function all() : Collection;
}
