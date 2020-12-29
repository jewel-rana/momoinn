<?php
namespace App\Services;

use App\Repositories\Interfaces\CategoryRepositoryInterface;

class Categories
{
    private $category;
    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }
}
