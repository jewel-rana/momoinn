<?php


namespace App\Services;


use App\Repositories\Interfaces\UserRepositoryInterface;

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
}
