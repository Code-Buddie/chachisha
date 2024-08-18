<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CorruptionCase extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'country_id','case_number', 'case_title',
        'court', 'case_summary', 'case_start_date', 'date_of_judgement', 'impact', 'publicly_visible', 'ref_url',
        'sector_id'];

    
    public function charges()
        {
            return $this->hasMany(Charges::class, 'case_id');
        }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function caseType()
    {
        return $this->belongsToMany(CaseType::class, 'corruption_cases_case_types', 'corruption_case_id', 'case_type_id');
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }


    public function accusedPersons()
    {
        return $this->hasMany(AccusedPerson::class, 'case_id');
    }

    public function countAccusedPersons()
    {
        return intval($this->accusedPersons()->count());
    }

    public static function getAverageTimeForAllCaseTypes()
    {
        $result = [];

        // Get all cases with case type and relevant dates
        $cases = self::with('caseType')
            ->whereNotNull('case_start_date')
            ->whereNotNull('date_of_judgement')
            ->get();

        // Group cases by case type
        $groupedCases = $cases->groupBy('caseType.id');

        foreach ($groupedCases as $caseTypeName => $casesByType) {
            $totalMonths = 0;

            foreach ($casesByType as $case) {
                $startDate = Carbon::parse($case->case_start_date);
                $judgmentDate = Carbon::parse($case->date_of_judgement);

                $totalMonths += $judgmentDate->diffInMonths($startDate);
            }

            $averageMonths = count($casesByType) > 0 ? round($totalMonths / count($casesByType)) : 0;

            $result[] = [
                'case_type' => $caseTypeName,
                'average_months' => $averageMonths,
            ];
        }

        return $result;
    }

    public static function getCasesPerSector()
    {
        $corruptionCases = self::all();
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

        // Convert the associative array to a simple indexed array
        return array_values($results);
    }
}
