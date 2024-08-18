<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CorruptionCaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'country_id'            => $this->country_id,
            'case_number'           =>$this->case_number,
            'case_title'            =>$this->case_title,
            'court'                 =>$this->court,
            'case_summary'          =>$this->case_summary,
            'case_start_date'       =>$this->case_start_date,
            'date_of_judgement'     =>$this->date_of_judgement,
            'impact'                =>$this->impact,
            'publicly_visible'      =>$this->publicly_visible,
            'ref_url'               =>$this->ref_url,
            'sector_id'             =>$this->sector_id,
            'accused_persons'       =>$this->accused_persons
        ];;
    }
}
