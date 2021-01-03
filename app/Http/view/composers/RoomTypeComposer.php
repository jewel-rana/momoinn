<?php


namespace App\Http\View\Composers;


use App\Services\Roles;
use App\Services\RoomTypes;
use Illuminate\View\View;

class RoomTypeComposer
{
    /**
     * The user repository implementation.
     *
     * @var
     */
    protected $roomTypes;

    /**
     * Create a new profile composer.
     *
     * @param RoomTypes $roomTypes
     */
    public function __construct( RoomTypes $roomTypes)
    {
        $this->roomTypes = $roomTypes;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('room_type_dropdowns', $this->roomTypes->getRoomTypes());
    }
}
