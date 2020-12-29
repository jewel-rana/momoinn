<?php


namespace App\Repositories;


use App\Models\Option;
use App\Repositories\Interfaces\OptionRepositoryInterface;
use Illuminate\Support\Collection;

class OptionRepository extends BaseRepository implements OptionRepositoryInterface
{
    public function __construct(Option $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return parent::all();
    }
}
