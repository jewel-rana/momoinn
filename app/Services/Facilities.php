<?php


namespace App\Services;


use App\Repositories\Interfaces\FacilityRepositoryInterface;

class Facilities
{
    private $facility;
    public function __construct(FacilityRepositoryInterface $facility)
    {
        $this->facility = $facility;
    }

    public function create(array $params)
    {
        return $this->facility->create($params);
    }

    public function update(array $params, $id)
    {
        return $this->facility->update($params, $id);
    }
}
