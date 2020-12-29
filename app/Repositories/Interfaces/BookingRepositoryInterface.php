<?php


namespace App\Repositories\Interfaces;


use Illuminate\Support\Collection;

interface BookingRepositoryInterface
{
    public function all() : Collection;
}
