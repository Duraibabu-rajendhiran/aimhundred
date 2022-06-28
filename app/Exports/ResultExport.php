<?php

namespace App\Exports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;


class ResultExport implements FromCollection,WithHeadings,WithStyles,WithColumnWidths
{

    private $student;


    public function __construct($value)
    {

        $this->value = $value;
    }

    public function collection()
    {



        return collect($this->value);

    }


    public function headings(): array
    { 
    return [[session('head1')->title."th",session('head1')->school_name],["Rank","StudentName","Time(M)","TotalMark"]];
    }


    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true,'size' => 22]],
            'A'    => ['font' => ['italic' => true]],
            // Styling a specific cell by coordinate.
            'B1' => ['font' => ['italic' => true]],
            // Styling an entire column.
            '2'  => ['font' => ['size' => 12,'bold' => true]],
            '3'  => ['color' => ['green' => true,'italic' => true]],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 23,
            'B' => 23,            
            'C' => 23,            
            'D' => 23,            
            'E' => 23,            
        ];
    }


}
