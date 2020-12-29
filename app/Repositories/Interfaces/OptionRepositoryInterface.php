<?php


namespace App\Repositories\Interfaces;


use Illuminate\Support\Collection;

interface OptionRepositoryInterface
{
    public function all() : Collection;
}
