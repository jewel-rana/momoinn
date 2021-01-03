<?php


namespace App\Services;


use App\Repositories\Interfaces\RoomTypeRepositoryInterface;

class RoomTypes
{
    private $roomType;
    public function __construct(RoomTypeRepositoryInterface $roomType)
    {
        $this->roomType = $roomType;
    }

    public function getRoomTypes()
    {
        return $this->roomType->all()->pluck('name', 'id');
    }
}
