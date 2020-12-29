<?php


namespace App\Services;


use App\Repositories\Interfaces\CustomerRepositoryInterface;

class Customers
{
    private $customer;
    public function __construct(CustomerRepositoryInterface $customer)
    {
        $this->customer = $customer;
    }
}
