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
}
