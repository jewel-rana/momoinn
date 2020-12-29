<?php


namespace App\Repositories\Interfaces;


use Illuminate\Support\Collection;

interface RestaurantRepositoryInterface
{
    public function all() : Collection;
}
