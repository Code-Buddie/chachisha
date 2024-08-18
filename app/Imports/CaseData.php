<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class CaseData implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return string[]
     */
    public function model(array $row)
    {
        return [
            "id" => $row['id'],
            "count-number" => $row['count-number'],
            "count" => $row['count'],
            "case number" => $row['case number'],
            "case title" => $row['case title'],
            "case summary" => $row['case summary'],
            "case type" => $row['case type'],
            "specific case type" => $row['specific case type'],
            "case start date" => $row['case start date'],
            "date of judgement" => $row['date of judgement'],
            "sector" => $row['sector'],
            "court" => $row['court'],
            "country" => $row['country'],
            "county" => $row['county'],
            "constituency" => $row['constituency'],
            "accused person's name" => $row['accused person\'s name'],
            "accused person gender" => $row['accused person gender'],
            "accussed person employer" => $row['accused person employer'],
            "accused person level" => $row['accused person level'],
            "date of offence" => $row['date of offence'],
            "amount involved" => $row['amount involved'],
            "assets involved" => $row['assets involved'],
            "plea" => $row['plea'],
            "case resolution" => $row['case resolution'],
            "type of judgement" => $row['type of judgement'],
            "sentence" => $row['sentence'],
            "fine issued" => $row['fine issued'],
            "assets recovered" => $row['assets recovered'],
            "value of assets" => $row['value of assets']
        ];
    }
}
