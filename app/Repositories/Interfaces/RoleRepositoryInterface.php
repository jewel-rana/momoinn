<?php


namespace App\Repositories\Interfaces;


interface RoleRepositoryInterface
{
    public function all();
    public function create(array $data);
    public function update(array $data, $id);
}
