<?php


namespace App\Repositories\Interfaces;


use Illuminate\Support\Collection;

interface BannerRepositoryInterface
{
    public function all() : Collection;
    public function create(array $data);
    public function update(array $data, $id);
}
