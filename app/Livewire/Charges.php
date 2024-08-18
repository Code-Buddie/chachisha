<?php

namespace App\Livewire;

use Closure;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Charges extends Component
{
    /**
     * The charges index in the case.
     *
     * @var integer
     */
    public $index;

    /**
     * Create a new component instance.
     */
    public function __construct(int $index = 0)
    {
        $this->index = $index;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.charges');
    }
}
