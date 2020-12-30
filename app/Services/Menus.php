<?php


namespace App\Services;


use App\Repositories\Interfaces\MenuRepositoryInterface;

class Menus
{
    private $menu;
    public function __construct(MenuRepositoryInterface $menu)
    {
        $this->menu = $menu;
    }

    public function getNested()
    {
        return $this->menu->all()->groupBy('parent_id')->sortDesc('position');
    }
}
