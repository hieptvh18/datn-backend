<?php

namespace App\Imports;

use App\Models\Schedule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportSchedule implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Schedule([
            'fullname'=> $row['fullname'],
            'birthday'=> $row['birthday'],
            'gender'=> $row['gender'],
            'phone'=> $row['phone'],
            'email'=> $row['email'],
            'address'=> $row['address'],
            'cmnd'=> $row['cmnd'],
            'content'=> $row['content'],
            'date'=> $row['date'],
            'status'=>0
        ]);
    }
}
