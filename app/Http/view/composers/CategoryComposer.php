<?php

namespace Larabill\Http\View\Composers;


use App\Services\Categories;
use Illuminate\View\View;

class CategoryComposer
{
    /**
     * The user repository implementation.
     *
     * @var
     */
    protected $categories;

    /**
     * Create a new profile composer.
     *
     * @param Categories $categories
     */
    public function __construct( Categories $categories)
    {
        $this->categories = $categories;
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
            'category_dropdowns' => $this->categories->getDropdown()
        ]);
    }
}
