<?php

namespace App\Exports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;


class ResultExport1 implements FromCollection,WithHeadings,WithStyles,WithColumnWidths
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
        
    return [["Rank","Student Name","School Name","Time(Mint)","Total Mark"]];

    }





    public function styles(Worksheet $sheet)
    {
        return [
  
            1    => ['font' => ['bold' => true,'size' => 15]],
          
            'A'    => ['font' => ['italic' => true]],
            // Styling a specific cell by coordinate.
            'B1' => ['font' => ['italic' => true]],

       
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 23,
            'B' => 23,            
            'C' => 33,            
            'D' => 23,            
            'E' => 23,            
        ];
    }


}
