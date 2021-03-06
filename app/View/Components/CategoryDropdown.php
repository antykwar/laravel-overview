<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategoryDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view(
            'components.category-dropdown',
            [
                'categories' => Category::oldest('name')->get(),
                'currentCategory' => request('category') ? Category::firstWhere('slug', request('category')) : null
            ]
        );
    }
}
