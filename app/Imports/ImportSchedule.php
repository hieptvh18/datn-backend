<?php

namespace App\Imports;

use App\Models\Schedule;
use App\Models\ScheduleService;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportSchedule implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $schedule;

    public function model(array $row)
    {
       $schedules = $this->schedule = Schedule::create([
            'fullname'=> $row['fullname'],
                // 'birthday'=> $row['birthday'],
                'birthday'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['birthday'])->format('Y-m-d'),
                'gender'=> $row['gender'],
                'phone'=> $row['phone'],
                'email'=> $row['email'],
                'address'=> $row['address'],
                'cmnd'=> $row['cmnd'],
                'content'=> '',
                'date'=> $row['date'],
                'date'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date'])->format('Y-m-d'),
                // 'service_id'=> $row['service'],
                'counter'=> 0,
                'status'=>0,
        ]);

        return new ScheduleService([
                'schedule_id'=> $schedules->id,
                'service_id'=> $row['service'],
        ]);
    }
}
