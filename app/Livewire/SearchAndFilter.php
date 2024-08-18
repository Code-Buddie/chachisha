<?php

namespace App\Livewire;

use App\Models\AccusedPersonLevel;
use App\Models\CaseResolution;
use App\Models\CaseType;
use App\Models\CountyCategogoryPricing;
use App\Models\CorruptionCase;
use App\Models\Country;
use App\Models\Sector;
use App\Models\TypeOfJudgement;
use Livewire\Component;
use Livewire\WithPagination;

class SearchAndFilter extends Component
{
    // Page data
    public $search = '';
    public $corruptionCases = [];
    public $countries;
    public $sectors;
    public $caseTypes;
    public $typeOfJudgements;
    public $resolutions;
    public $levels;
    public $projects;


    // Filters
    public $searchTerm;
    public $caseTypeFilter;
    public $countryFilter;
    public $sectorFilter;
    public $resolutionFilter;
    public $genderFilter;
    public $judgmentFilter;
    public $levelFilter;
    public $amountFilter;
    public $pleaFilter;



    public function render()
    {
        $query = CorruptionCase::query();

        if ($this->searchTerm) {
            $query->where(function ($subQuery) {
                $subQuery->orWhere('case_number', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('case_title', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('court', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('case_summary', 'like', '%' . $this->searchTerm . '%');
            });
        }

        if ($this->caseTypeFilter) {
            $query->whereHas('caseType', function ($subQuery) {
                $subQuery->where('case_types.id', $this->caseTypeFilter);
            });
        }

        if ($this->countryFilter) {
            $query->where('country_id', $this->countryFilter);
        }

        if ($this->sectorFilter) {
            $query->where('sector_id', $this->sectorFilter);
        }

        if ($this->genderFilter) {
            $query->whereHas('accusedPersons', function ($subQuery) {
                $subQuery->where('gender', $this->genderFilter);
            });
        }

        if ($this->levelFilter) {
            $query->whereHas('accusedPersons', function ($subQuery) {
                $subQuery->where('level', $this->levelFilter);
            });
        }

        if ($this->resolutionFilter) {
            $query->whereHas('accusedPersons.charges.resolution', function ($subQuery) {
                $subQuery->where('id', $this->resolutionFilter);
            });
        }


        if ($this->judgmentFilter) {
            $query->whereHas('accusedPersons.charges.typeOfJudgement', function ($subQuery) {
                $subQuery->where('id', $this->judgmentFilter);
            });
        }

        if ($this->amountFilter) {
            $query->whereHas('accusedPersons.charges', function ($subQuery) {
                $subQuery->where('amount', $this->amountFilter);
            });
        }

        if ($this->pleaFilter) {
            $query->whereHas('accusedPersons.charges', function ($subQuery) {
                $subQuery->where('plea', $this->pleaFilter);
            });
        }


        $this->corruptionCases = $query->get();


        $this->cases = $query->get();
        $this->countries = Country::where('status', 1)->get();
        $this->sectors = Sector::where('status', 1)->get();
        $this->caseTypes = CaseType::where('status', 1)->get();
        $this->resolutions = CaseResolution::where('status', 1)->get();
        $this->typeOfJudgements = TypeOfJudgement::where('status', 1)->get();
        $this->levels = AccusedPersonLevel::where('status', 1)->get();
        $this->projects = CountyCategogoryPricing::orderBy('ranking')
                        ->limit(5)
                        ->get();


        // for each case generate a report

        return view('livewire.search-and-filter');
    }

    public function getTopProjects(int $countyId, float $totalBudget)
    {
        // Retrieve top 5 ranked projects for the given county
        $projects = CountyCategogoryPricing::where('county_id', $countyId)
            ->orderBy('ranking')
            ->limit(5)
            ->get();

        // Initialize an array to store results
        $result = [];

        // Calculate how many of each project can be done
        foreach ($projects as $project) {
            $projectCost = $project->budget_cost;

            // Calculate how many can be done with the available budget
            $quantity = (int)($totalBudget / $projectCost);

            // Prepare the result
            $result[] = [
                'service_name' => $project->service_name,
                'budget_cost' => $projectCost,
                'quantity' => $quantity,
            ];
        }

        return response()->json($result);
    }
}

