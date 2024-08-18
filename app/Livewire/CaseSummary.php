<?php

namespace App\Livewire;

use Livewire\Component;

class CaseSummary extends Component
{

    // add here case data
    public $displayInputValue = '';
    public $displayNestedArray = [];

    protected $listeners = ['inputValuesChanged' => 'onInputValuesChanged'];

    public function onInputValuesChanged($inputValues)
    {
        // Assign the values to the corresponding properties
        $this->displayInputValue = $inputValues['inputValue'];
        $this->displayNestedArray = $inputValues['nestedArray'];
    }


    public function render()
    {
        return view('components.case-summary');
    }


}
