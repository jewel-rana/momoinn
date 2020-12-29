<?php


namespace App\Repositories\Interfaces;


use Illuminate\Support\Collection;

interface CouponRepositoryInterface
{
    public function all() : Collection;
}
