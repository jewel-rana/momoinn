<?php


namespace App\Repositories;


use App\Models\RoomType;
use App\Repositories\Interfaces\RoomTypeRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class RoomTypeRepository extends BaseRepository implements RoomTypeRepositoryInterface
{
    public function __construct(RoomType $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return Cache::rememberForever('room_types', function() {
            return parent::all();
        });
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
