<?php


namespace App\Repositories\Interfaces;


use Illuminate\Support\Collection;

interface FacilityRepositoryInterface
{
    public function all() : Collection;
    public function create(array $data);

    public function update(array $data, $id);
}
