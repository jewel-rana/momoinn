<?php

namespace Larabill\Http\View\Composers;


use App\Services\Menus;
use Illuminate\View\View;

class MenuComposer
{
    /**
     * The user repository implementation.
     *
     * @var
     */
    protected $menus;

    /**
     * Create a new profile composer.
     *
     * @param Menus $menus
     */
    public function __construct( Menus $menus)
    {
        $this->menus = $menus;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'menus' => $this->areas->getNested()
        ]);
    }
}
