<?php


namespace App\Repositories\Interfaces;


use Illuminate\Support\Collection;

interface CouponRepositoryInterface
{
    public function all() : Collection;
    public function create(array $data);

    public function update(array $data, $id);
}
