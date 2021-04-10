<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CompanyView extends Component
{
    public $name;
    public $img;
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $img, $id)
    {
        $this->name = $name;
        $this->img = $img;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.company-view');
    }
}
