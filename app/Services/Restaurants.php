<?php


namespace App\Services;


use App\Repositories\Interfaces\RestaurantRepositoryInterface;

class Restaurants
{
    private $restaurant;

    public function __construct(RestaurantRepositoryInterface $restaurant)
    {
        $this->restaurant = $restaurant;
    }

    public function create(array $params)
    {
        return $this->restaurant->create($params);
    }

    public function update(array $params)
    {
        return $this->restaurant->update($params);
    }
}
