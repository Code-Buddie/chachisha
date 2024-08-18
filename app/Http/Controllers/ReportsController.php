<?php

namespace App\Http\Controllers;

use App\Imports\CaseData;
use App\Models\AccusedPerson;
use App\Models\AccusedPersonLevel;
use App\Models\CaseResolution;
use App\Models\CaseType;
use App\Models\Charges;
use App\Models\CorruptionCase;
use App\Models\Country;
use App\Models\County;
use App\Models\Constituency;
use App\Models\Sector;
use App\Models\SpecificCaseType;
use App\Models\TypeOfJudgement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Tapp\Airtable\Airtable;


class ReportsController extends Controller
{
    public function index()
    {
        $corruptionCases = CorruptionCase::get();
        $countries = Country::where('status', 1)->get();
        $sectors = Sector::where('status', 1)->get();
        $caseTypes = CaseType::where('status', 1)->get();
        $resolutions = CaseResolution::where('status', 1)->get();
        $levels = AccusedPersonLevel::where('status', 1)->get();

        // Pass the data to the Blade view
        return view('home', [
                'corruptionCases' => $corruptionCases,
                'countries' => $countries,
                'sectors' => $sectors,
                'resolutions' => $resolutions,
                'levels' => $levels,
                'caseTypes' => $caseTypes]
        );
    }

    public function show($id)
    {
        $corruptionCase = CorruptionCase::find($id);

        $charges = Charges::where('case_id', $id)->get();

        return view('pages/details',
            [
                'corruptionCase' => $corruptionCase,
                'charges' => $charges
            ]
        );

    }

    public function requestUploadFile()
    {
        return view('pages/upload');
    }

    public function processExcel(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'excelFile' => 'required|mimes:xlsx,xls', // Adjust the file size limit as needed
        // ]);

        $file = $request->file('excelFile');
        // dd($file);
        if ($request->hasFile('excelFile')) {

            // Import data from Excel file
            $data = Excel::toArray(new CaseData(), $file);
            

            // Process and format the data as needed
            foreach ($data[0] as $row) {
            //    dd($row);
                $formattedRow = $this->processRow($row);
                // Get the

                // Write each row to Airtable
                // $this->writeToAirtable($formattedRow);
            }
        }


        return redirect()->back()->with('success', 'File uploaded successfully.');
    }


    private function processRow($row)
    {
        if ($row != null) {
            //"id","count-number","count","case number","case title","case summary","case type","specific case type","case start date","date of judgement","sector","court","country","accused person's name","accused person gender","accussed person employer","accused person level","date of offence","amount involved","assets involved","plea","case resolution","type of judgement","sentence","fine issued","assets recovered","value of assets"
            // check if the case type and specific case type exists, if they dont, add them to the database

            // There are only 11 case types
            // The  case types are already seeded in the database
            $caseTypes = CaseType::all();
            $currentCaseTypeIds = collect();
            foreach ($caseTypes as $caseType) {
                $words = str_word_count($caseType->name, 1);
                // Get the first two words or the first word if only one word in the case type
                // I am getting the first word or 2 words because whoever did this had the wisdom to
                // not consider splitting it by a semicolon or by any other separator. A comma cannot be used
                $term = implode(' ', array_slice($words, 0, 2));

                if (containsCaseInsensitive($row['case_type'], $term)) {
                    $currentCaseTypeIds->push($caseType->id);
                }
            }

            $specificCaseTypesCollection = collect();

            // Author decided to use semicolon as a separetor
            // because the team doing this did a horrible job specifying the specific case type, we are going to
            // now split each specific case type by comma, or semicolon, depending on which one came first
            if (stripos($row['specific_case_type'], ";") !== false) {
                $specificCaseTypes = explode(";", $row['specific_case_type']);

                foreach ($specificCaseTypes as $specificCaseType) {
                    // split by comma and add each to the collection of specific case types
                    foreach (explode(",", $specificCaseType) as $caseType) {
                        $specificCaseTypesCollection->push($caseType);
                    }
                }
            }
            if (stripos($row['specific_case_type'], ",") !== false) {
                $specificCaseTypes = explode(",", $row['specific_case_type']);

                foreach ($specificCaseTypes as $specificCaseType) {
                    // split by comma and add each to the collection of specific case types
                    foreach (explode(";", $specificCaseType) as $caseType) {
                        $specificCaseTypesCollection->push($caseType);
                    }
                }
            }


            $sector = Sector::where('name', $row['sector'])->first();
            if ($sector == null) {
                if ($row['sector'] == null) {
                    return $row;
                } else if (mb_strlen($row['sector']) > 100) {
                    return $row;
                }
                $sector = Sector::create(
                    ['name' => $row['sector']]
                );
            }

            $caseData = [
                'user_id' => auth()->user()->id, // Assuming you have a logged-in user
                'country_id' => Country::where('name', $row['country'])->first()->id,
                'case_number' => $row['case_number'],
                'case_title' => $row['case_title'],
                'court' => $row['court'],
                'case_summary' => $row['case_summary'],
                'case_start_date' => Carbon::create($row['case_start_date'], 1, 1)->startOfYear(),
                'date_of_judgement' => Carbon::create($row['date_of_judgement'], 1, 1)->startOfYear(),
                'impact' => '', // Adjust accordingly if 'impact' is present in the Excel file
                'publicly_visible' => 0, // Adjust accordingly if 'publicly_visible' is present in the Excel file
                'ref_url' => '', // Adjust accordingly if 'ref_url' is present in the Excel file
                'sector_id' => $sector->id,
            ];

            if ($row['case_title'] != null) {
                $corruptionCase = CorruptionCase::updateOrCreate(
                    ['case_number' => $row['case_number']],
                    $caseData
                );

                foreach ($specificCaseTypesCollection as $specificCaseType) {
                    SpecificCaseType::updateOrCreate([
                        'corruption_case_id' => $corruptionCase->id,
                        'name' => $specificCaseType,
                    ], [
                        'corruption_case_id' => $corruptionCase->id,
                        'name' => $specificCaseType,
                    ]);
                }

                foreach ($currentCaseTypeIds as $caseTypeId) {
                    DB::table('corruption_cases_case_types')->updateOrInsert([
                        'corruption_case_id' => $corruptionCase->id,
                        'case_type_id' => $caseTypeId,
                    ], [
                        'corruption_case_id' => $corruptionCase->id,
                        'case_type_id' => $caseTypeId,
                    ]);
                }

//                dd($row);

                $level = AccusedPersonLevel::where('name', $row['accused_person_level'])->first();
                if ($level == null) {
                    if ($row['accused_person_level'] == null) {
                        return $row;
                    } else if (mb_strlen($row['accused_person_level']) > 100) {
                        return $row;
                    }
                    $level = AccusedPersonLevel::create(
                        ['name' => $row['accused_person_level']]
                    );
                }
                $county = County::where('name', $row['county'])->first();
                $constituency = Constituency::where('constituency_name', $row['constituency'])->first();

               
               

                if($county == null){
                    $county_id = 1;
                } else{
                    $county_id = $county->id;
                }

                if($constituency == null){
                    $constituency_id = 1;
                } else{
                    $constituency_id = $constituency->id;
                }

                $accusedPersonData = [
                    'case_id' => $corruptionCase->id,
                    'gender' => $row['accused_person_gender'],
                    'employer' => $row['accussed_person_employer'],
                    'level' => $level->id,
                    'county_id' => $county_id,
                    'constituency_id' => $constituency_id,
                ];


                // Split the accused person's name into first, middle, and last names
                $accusedPersonNames = explode(' ', $row['accused_persons_name']);

                if (count($accusedPersonNames) > 2) {
                    // has first, middle and last name
                    $accusedPersonData['first_name'] = $accusedPersonNames[0];
                    $accusedPersonData['middle_name'] = $accusedPersonNames[1];
                    $accusedPersonData['last_name'] = $accusedPersonNames[2];
                } else {
                    $accusedPersonData['first_name'] = $accusedPersonNames[0];
                    $accusedPersonData['last_name'] = $accusedPersonNames[1];

                }

                

                // constituency


                $accusedPerson = AccusedPerson::updateOrCreate(
                    ['case_id' => $corruptionCase->id, 'first_name' => $accusedPersonData['first_name'], 'last_name' => $accusedPersonData['last_name']],
                    $accusedPersonData
                );

                $typeOfJudgement = TypeOfJudgement::where('name', $row['type_of_judgement'])->first();

                if ($typeOfJudgement == null) {
                    $typeOfJudgement = TypeOfJudgement::create(
                        ['name' => $row['type_of_judgement'],
                            'status' => 1]
                    );
                }

                $caseResolution = CaseResolution::where('name', $row['case_resolution'])->first();

                if ($caseResolution == null) {
                    $caseResolution = CaseResolution::create(
                        ['name' => $row['case_resolution'],
                            'status' => 1]
                    );
                }

                $dateOfOffence = $row['date_of_offence'];


                $chargesData = [
                    'charge' => $row['count'],
                    'count' => $row['count_number'] ? $row['count_number'] : 1, // Assuming 'count-number' corresponds to 'charge'
                    'date_of_offence' => $dateOfOffence,
                    'person_id' => $accusedPerson->id,
                    'plea' => $row['plea'],
                    'amount' => $row['amount_involved'],
                    'type_of_asset' => $row['assets_involved'],
                    'resolution_id' => $caseResolution->id,
                    'sentence' => $row['sentence'],
                    'fine_issued' => extractAndParseDigits($row['fine_issued']),
                    'assets_recovered' => $row['assets_recovered'],
                    'value' => extractAndParseDigits($row['value_of_assets']),
                    'type_of_judgement_id' => $typeOfJudgement->id,
                ];

                if ($row['count'] != null) {
                    // Associate the charges with the accused person
                    $charges = Charges::updateOrCreate(
                        ['case_id' => $corruptionCase->id,
                            'charge' => $row['count'],
                            'amount' => $row['amount_involved'],
                            'plea' => $row['plea'],
                            'date_of_offence' => $dateOfOffence,
                            'type_of_judgement_id' => $typeOfJudgement->id],
                        $chargesData
                    );
                }

            }
        }

        return $row;
    }


    private function writeToAirtable($data)
    {


        $airtable = new Airtable([
            'api_key' => env('AIRTABLE_KEY', ''),
            'base' => env('AIRTABLE_BASE', ''),
        ]);

//        $airtable->table('tblPhQAs3A9UAwfgI');

//        $airtable->create($data);

    }

    public function methodology(){
        return view('methodology');
    }

}
