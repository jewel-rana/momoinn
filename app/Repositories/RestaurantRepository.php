<?php


namespace App\Repositories;


use App\Models\Restaurant;
use App\Repositories\Interfaces\RestaurantRepositoryInterface;
use Illuminate\Support\Collection;

class RestaurantRepository extends BaseRepository implements RestaurantRepositoryInterface
{
    public function __construct(Restaurant $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return parent::all();
    }

    public function create(array $data)
    {
        return parent::create($data);
    }

    public function update(array $data, $id)
    {
        return parent::update($data, $id);
    }
}
