<?php

namespace App\Livewire;

use App\Models\AnalysisPoints;
use App\Models\CaseType;
use App\Models\CorruptionCase;
use App\Models\Country;
use App\Models\Sector;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;


class LivewireCharts extends Component
{

    public $countries;
    public $sectors;
    public $caseTypes;
    public $analyses;

    public $countryFilter;
    public $analysisTypeFilter;
    public $startDateFilter;
    public $endDateFilter;


    public function mount()
    {
        $this->countries = Country::where('status', 1)->get();
        $this->sectors = Sector::where('status', 1)->get();
        $this->caseTypes = CaseType::where('status', 1)->get();
        $this->analyses = AnalysisPoints::where('status', 1)->get();
    }

    public function updated($propertyName)
    {
        // This method will be called whenever a public property is updated

        // If any of the filters change, force a re-render of the component
        if (in_array($propertyName, ['countryFilter', 'analysisTypeFilter', 'startDateFilter', 'endDateFilter'])) {
            $this->render();
        }
    }


    public function render()
    {
        $model = new ColumnChartModel();

        $query = CorruptionCase::query();

        if ($this->countryFilter) {
            $query->where('country_id', $this->countryFilter);
        }

        if ($this->startDateFilter) {
            $query->where('case_start_date', $this->sectorFilter);
        }

        if ($this->endDateFilter) {
            $query->where('date_of_judgement', $this->endDateFilter);
        }

        $corruptionCases = $query->get();

        //1:Average Time Taken to Conclude Cases
        //2:Outcomes on Case Type
        //3:Outcome of Specific Case Types by Country
        //4:Amounts Recovered on Case Types and Specific Case Types
        //5:Offices Involved
        //6:Levels of Officials Involved
        //7:Affected Public Sectors

        if ($this->analysisTypeFilter == null || $this->analysisTypeFilter == 1) {

            $casesByTimeTaken = $this->casesByAverageTimeTaken($corruptionCases);
            $model = new ColumnChartModel();
            $model->setTitle('Average time taken by case type')->withoutLegend()
                ->withGrid();;

            foreach ($casesByTimeTaken as $caseByTimeTaken) {
                $model->addColumn($caseByTimeTaken['case_type'], $caseByTimeTaken['case_count'], $this->generateRandomColor());
            }


        } else if ($this->analysisTypeFilter == 7) {
            $casesBySector = $this->casesBySector($corruptionCases);
            $model = new ColumnChartModel();
            $model->setTitle('Affected Public Sectors')->withoutLegend()
                ->withGrid();
            foreach ($casesBySector as $caseBySector) {
                $model->addColumn($caseBySector['sector_name'], $caseBySector['case_count'], $this->generateRandomColor());
            }

        }


        return view('livewire.livewire-charts', [
            'model' => $model,
        ]);
    }


    function generateRandomColor(): string
    {
        // Generate a random RGB color
        $red = mt_rand(0, 255);
        $green = mt_rand(0, 255);
        $blue = mt_rand(0, 255);

        // Convert RGB to hexadecimal
        return sprintf("#%02X%02X%02X", $red, $green, $blue);
    }

    private function casesByAverageTimeTaken(Collection|array $corruptionCases)
    {
        $caseTypes = CaseType::all();
        $averageCaseCount = [];

        foreach ($caseTypes as $caseType) {
            $caseTypeName = $caseType->name; // Replace 'name' with the actual attribute for the case type name
            $casesCount = $caseType->casesCount();

            $averageCaseCount[] = [
                'case_type' => $caseTypeName,
                'case_count' => $casesCount,
            ];
        }

        return $averageCaseCount;
    }

    private function casesBySector(Collection|array $corruptionCases)
    {
        $results = [];
        foreach ($corruptionCases as $corruptionCase) {
            $sectorName = $corruptionCase->sector->name;

            if (isset($results[$sectorName])) {
                // If sector name already exists in results, increment case count
                $results[$sectorName]['case_count']++;
            } else {
                // If sector name doesn't exist in results, add a new entry
                $results[$sectorName] = [
                    'sector_name' => $sectorName,
                    'case_count' => 1,
                ];
            }
        }

        return array_values($results);
    }
}
