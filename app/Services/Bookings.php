<?php


namespace App\Services;


use App\Repositories\Interfaces\BookingRepositoryInterface;

class Bookings
{
    private $booking;

    public function __construct(BookingRepositoryInterface $booking)
    {
        $this->booking = $booking;
    }
}
