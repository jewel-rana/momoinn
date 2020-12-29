<?php


namespace App\Repositories\Interfaces;


use Illuminate\Support\Collection;

interface BannerRepositoryInterface
{
    public function all() : Collection;
}
