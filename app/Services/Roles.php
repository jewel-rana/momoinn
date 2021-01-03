<?php


namespace App\Services;


use App\Repositories\Interfaces\RoleRepositoryInterface;

class Roles
{
    private $role;
    public function __construct(RoleRepositoryInterface $role)
    {
        $this->role = $role;
    }

    public function all()
    {
        return $this->role->all();
    }

    public function create(array $data)
    {
        return $this->role->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->role->update($data, $id);
    }

    public function getRoles()
    {
        return $this->role->all()->whereNotIn('name', ['customer'])->pluck('name', 'id');
    }
}
