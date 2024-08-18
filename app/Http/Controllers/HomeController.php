<?php

namespace App\Http\Controllers;

use App\Models\AccusedPersonLevel;
use App\Models\CaseResolution;
use App\Models\CaseType;
use App\Models\Charges;
use App\Models\CorruptionCase;
use App\Models\Country;
use App\Models\Sector;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $corruptionCases = CorruptionCase::get();

        $countries = Country::where('status', 1)->get();
        $sectors = Sector::where('status', 1)->get();
        $caseTypes = CaseType::where('status', 1)->get();
        $resolutions = CaseResolution::where('status', 1)->get();
        $levels = AccusedPersonLevel::where('status', 1)->get();

        // Pass the data to the Blade view
        return view('pages/home',
            [
                'corruptionCases' => $corruptionCases,
                'countries' => $countries,
                'sectors' => $sectors,
                'resolutions' => $resolutions,
                'levels' => $levels,
                'caseTypes' => $caseTypes
            ]
        );
    }


    public function show($id)
    {
        $corruptionCase = CorruptionCase::find($id);

        $charges = Charges::where('case_id', $id)->get();
        $caseTypes = DB::table('corruption_cases_case_types')->where('corruption_case_id', $id)->get();

        return view('pages/details',
            [
                'corruptionCase' => $corruptionCase,
                'caseTypes' => $caseTypes,
                'charges' => $charges

            ]
        );

    }

    public function addCase()
    {
        $countries = Country::where('status', 1)->get();
        $caseTypes = CaseType::where('status', 1)->get();
        $sectors = Sector::where('status', 1)->get();
        return view('pages/add-case', ['countries' => $countries, 'caseTypes' => $caseTypes, 'sectors' => $sectors]);
    }



}
