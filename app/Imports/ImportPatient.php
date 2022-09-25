<?php

namespace App\Imports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportPatient implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Patient([
            'customer_name'=> $row['fullname'],
            'phone'=> $row['phone'],
            'description'=> $row['description'],
            'address'=> $row['address'],
            'birthday'=> $row['birthday'],
            'cmnd'=> $row['cmnd'],
            'status'=> 0
        ]);
    }
}
