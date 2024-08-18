<?php

namespace App\Livewire;

use App\Models\AccusedPersonLevel;
use App\Models\CaseResolution;
use App\Models\CaseType;
use App\Models\CorruptionCase;
use App\Models\Country;
use App\Models\Region;
use App\Models\Sector;
use App\Models\User;
use Livewire\Component;

class Settings extends Component
{
    public $countries;
    public $sectors;
    public $caseTypes;
    public $resolutions;
    public $levels;
    public $regions;
    public $users;


    public function render()
    {
        $corruptionCases = CorruptionCase::get();

        $this->countries = Country::where('status', 1)->get();
        $this->sectors = Sector::where('status', 1)->get();
        $this->caseTypes = CaseType::where('status', 1)->get();
        $this->resolutions = CaseResolution::where('status', 1)->get();
        $this->levels = AccusedPersonLevel::where('status', 1)->get();
        $this->regions = Region::where('status', 1)->get();
        $this->users = User::all();

        return view('livewire.settings');
    }
}
