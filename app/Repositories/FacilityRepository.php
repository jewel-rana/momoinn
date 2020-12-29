<?php


namespace App\Repositories;


use App\Models\Facility;
use App\Repositories\Interfaces\FacilityRepositoryInterface;
use Illuminate\Support\Collection;

class FacilityRepository extends BaseRepository implements FacilityRepositoryInterface
{
    public function __construct(Facility $model)
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
