<?php


namespace App\Services;


use App\Repositories\Interfaces\BannerRepositoryInterface;

class Banners
{
    private $banner;

    public function __construct(BannerRepositoryInterface $banner)
    {
        $this->banner = $banner;
    }

    public function create(array $params)
    {
        return $this->banner->create($params);
    }

    public function update(array $params, $id)
    {
        return $this->banner->update($params, $id);
    }
}
