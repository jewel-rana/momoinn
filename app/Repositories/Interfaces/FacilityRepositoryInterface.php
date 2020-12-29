<?php


namespace App\Repositories\Interfaces;


use Illuminate\Support\Collection;

interface FacilityRepositoryInterface
{
    public function all() : Collection;
}
