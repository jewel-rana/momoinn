<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Jolzatra\Repository\Interfaces\MerchantRepositoryInterface;

class MenuRepository extends BaseRepository implements MerchantRepositoryInterface
{
    public function __construct(Model $model)
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