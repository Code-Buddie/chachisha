<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AccusedPersonLevel;
use App\Models\CaseResolution;
use App\Models\CaseType;
use App\Models\CorruptionCase;
use App\Models\Country;
use App\Models\Region;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class SettingsController extends Controller
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

    public function index()
    {
        $corruptionCases = CorruptionCase::get();

        $countries = Country::where('status', 1)->get();
        $sectors = Sector::where('status', 1)->get();
        $caseTypes = CaseType::where('status', 1)->get();
        $resolutions = CaseResolution::where('status', 1)->get();
        $levels = AccusedPersonLevel::where('status', 1)->get();
        $regions = Region::where('status', 1)->get();
        $users = User::all();

        // Pass the data to the Blade view
        return view('pages/settings',
            [
                'corruptionCases' => $corruptionCases,
                'countries' => $countries,
                'sectors' => $sectors,
                'resolutions' => $resolutions,
                'levels' => $levels,
                'caseTypes' => $caseTypes,
                'regions' => $regions,
                'users' => $users,
            ]
        );
    }
}
