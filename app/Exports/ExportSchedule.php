<?php

namespace App\Exports;

use App\Models\Schedule;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;

class ExportSchedule implements FromQuery, WithTitle, WithHeadings, WithEvents, WithCustomStartCell
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $date;

    public function __construct($date)
    {
     $this->date = $date;
     return $this;
    }
    public function startCell(): string
    {
        return 'A2';
    }

    public function headings(): array
    {
        return [
          [
            "ID",
            "Họ và tên",
            "Ngày sinh",
            "Giới tính",
            "SĐT",
            "Email",
            "Địa chỉ",
            // "CMND",
            "Nội dung",
            "Ngày đặt lịch"
          ]
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event){
                /** @var Sheet */
                $sheet = $event->sheet;
                $sheet->mergeCells('A1:J1');
                $sheet->setCellValue('A1', 'Danh sách lịch khám '.$this->date.'');
                $styleArray = [
                    'font' => [
                        'bold'  =>  true,
                        'size'  =>  14,
                        'name'  =>  'Arial'
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ];

                $cellRange = 'A1:J1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);
            }
        ];
    }

    public function query()
    {
        if($this->date !== null){
        return Schedule::query()->select('id', 'fullname','birthday','gender','phone','email','address', 'content', 'date')->where('date', 'LIKE', '%'.$this->date.'%');
        }
        if($this->date == null){
            return Schedule::query()->select('id', 'fullname','birthday','gender','phone','email','address', 'content', 'date');
        }
    }

    public function title(): string
    {
        return 'Danh sách lịch khám';
    }
}
