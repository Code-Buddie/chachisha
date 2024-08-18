<?php

namespace App\Livewire;

use Closure;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AccusedPerson extends Component
{

    /**
     * The accused person index in the case.
     *
     * @var integer
     */
    public $index;


    /**
     * @var int the number of charges the person has
     */
    public $numberOfCharges = 1;



    public $fullName = '';
    public $charges = [];

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
        return view('components.accused-person', [
            'numberOfCharges' => $this->numberOfCharges,
        ]);
    }

    // Helper functions
    public function addNumberOfCharges()
    {
        $this->numberOfCharges++;
    }

    public function removeCharge()
    {
        $this->numberOfCharges --;
    }

    public function submit()
    {
        // You can include both $inputValue and $nestedArray in the event
        $this->emit('inputValuesChanged', ['inputValue' => $this->fullName, 'charges' => $this->charges]);
    }
}
