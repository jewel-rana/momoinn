<?php


namespace App\Http\View\Composers;


use App\Services\Roles;
use Illuminate\View\View;

class RoleComposer
{
    /**
     * The user repository implementation.
     *
     * @var
     */
    protected $roles;

    /**
     * Create a new profile composer.
     *
     * @param Roles $roles
     */
    public function __construct( Roles $roles)
    {
        $this->roles = $roles;
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
            'role_dropdowns' => $this->roles->getRoles()
        ]);
    }
}
