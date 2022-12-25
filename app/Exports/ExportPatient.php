<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;

class ExportPatient implements FromQuery, WithHeadings, WithEvents, WithCustomStartCell, WithTitle
{
    use Exportable;
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
            "SĐT",
            "Mô tả",
            "Địa chỉ",
            "Ngày sinh"
          ]
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event){
                /** @var Sheet */
                $sheet = $event->sheet;
                $sheet->mergeCells('A1:G1');
                $sheet->setCellValue('A1', 'Danh sách bệnh án ngày '.$this->date.'');
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

                $cellRange = 'A1:G1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);
            }
        ];
    }

    public function query()
    {
        if($this->date !== null){
        return Patient::query()->select('id', 'customer_name','phone','description','address','birthday')->where('created_at', 'LIKE', '%'.$this->date.'%');
        }
        if($this->date == null){
            return Patient::query()->select('id', 'customer_name','phone','description','address','birthday');
        }
    }

    public function title(): string
    {
        return 'Danh sách bệnh án';
    }

}
