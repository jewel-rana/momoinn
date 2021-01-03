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
        return $this->menu->all()->groupBy('parent_id');
    }

    public function create(array $data)
    {
        return $this->menu->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->menu->update($data, $id);
    }
}
