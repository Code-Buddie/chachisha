<?php

namespace App\Livewire;

use Closure;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CorruptionCase extends Component
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
    public $accussedPersons = 1;

    public $caseTypes;
    public $specificCaseTypes;
    public $sectors;

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
        return view('components.corruption-case', [
            'accusedPersons' => $this->accussedPersons,
        ]);
    }

    // Helper functions
    public function addNumberOfAccusedPersons()
    {
        $this->accussedPersons++;
    }

    public function decrementNumberOfAccusedPersosn()
    {
        $this->accussedPersons --;
    }
}
