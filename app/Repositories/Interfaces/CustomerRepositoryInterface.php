<?php


namespace App\Repositories\Interfaces;


use Illuminate\Support\Collection;

interface CustomerRepositoryInterface
{
    public function all() : Collection;
    public function create(array $data);

    public function update(array $data, $id);
}
