<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\WaitList;

class ExcelImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new WaitList ([
            'name' => $row[0],
            'email'=> $row[1],
            'phone_number'=> $row[2],
            'birthday'=> $row[3],
            'sex'=> $row[4],
            'address'=> $row[5],
            'course_id'=> $row[6],
        ]);
    }
}
