<?php


namespace App\Repositories\Interfaces;


use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    public function all() : Collection;
}
