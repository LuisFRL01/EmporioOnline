<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavigationDropdown extends Component
{    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->admin = $admin;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.navigation-dropdown');
    }
}
