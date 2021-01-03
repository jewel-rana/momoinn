<?php


namespace App\Services;


use App\Repositories\Interfaces\UserRepositoryInterface;
use Spatie\Permission\Models\Role;

class Users
{
    private $user;
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function create(array $data)
    {
        return $this->user->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->user->update($data, $id);
    }

    public function syncRole(array $data, int $id)
    {
        $user = $this->user->find($id);
        $user->roles->each(function($item, $key) use($user) {
            $user->removeRole($item);
        });
        $user->assignRole(Role::find($data['role_id']));
        return true;
    }
}
