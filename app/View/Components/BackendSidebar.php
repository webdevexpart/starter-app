<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BackendSidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $items = menu('backend-sidebar');
        return view('components.backend-sidebar', compact('items'));
    }
}
