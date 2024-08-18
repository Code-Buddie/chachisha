<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Charges extends Model
{

    protected $fillable = ['count', 'charge', 'case_id', 'person_id', 'date_of_offence', 'plea', 'amount', 'type_of_asset', 'resolution_id',
        'type_of_judgement_id', 'sentence', 'fine_issued', 'assets_recovered', 'value'];

    public function corruptionCase()
    {
        $this->belongsTo(CorruptionCase::class, 'case_id');
    }

    public function accusedPersons()
    {
        return $this->belongsTo(AccusedPerson::class, 'person_id');
    }

    public function resolution()
    {
        return $this->belongsTo(CaseResolution::class, 'resolution_id');
    }

    public function typeOfJudgement()
    {
        return $this->belongsTo(TypeOfJudgement::class, 'type_of_judgement_id');
    }

    public static function getCasesPerResolutionPerCaseType()
    {
        $result = [];

        // Get all charges with related data
        $charges = self::get();

        foreach ($charges as $charge) {
            if ($charge->has('accusedPersons')) {
                $corruptionCases = $charge->accusedPersons->corruptionCase;
                if ($corruptionCases != null) {
                    foreach ($corruptionCases as $corruptionCase) {
                        foreach ($corruptionCase->caseType as $type) {
                            $result[] = [
                                'case_type' => $type->name,
                                'resolution_type' => $charge->resolution->name,
                                'case_count' => 10,
                            ];

                        }
                    }
                }
            }
        }


        return $result;
    }


}
