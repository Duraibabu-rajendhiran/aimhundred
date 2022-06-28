<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\Result;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;


class QuestionExport implements FromCollection,WithHeadings,WithStyles,WithColumnWidths
{

 
    private $student;


    public function __construct($student)
    {

        $this->student = $student;
    }

    public function collection()
    {


        $array =  DB::table('results')
            ->join('students', 'students.id', '=', 'results.student_id')
            ->join('media', 'media.id', '=', 'results.medium_id')
            ->join('schools', 'schools.id', '=', 'results.school_id')
            ->join('periods', 'periods.id', '=', 'results.class_id')
            ->join('sections', 'sections.id', '=', 'students.section_id')
            ->join('boards', 'boards.id', '=', 'students.board_id')
            ->where("students.id", $this->student)
            ->join('subjects', 'subjects.id', '=', 'results.subject_id')
            ->selectRaw("time_left as total_time,marks as total_mark, total,results.date,subjects.subject")
            // ->groupby('results.student_id','students.full_name', 'results.date', 'subjects.subject')
            
            ->get()->groupBy('date');

        


        foreach ($array as $key=>$rank) {

            $Array = array();
            $Array['Date']=$key;

         foreach($rank as $ran){
             
            $time = substr($ran->total_time/60,0,2);
            if($time >1){
                $time= '('.$time.'Min)';
            }else{
                $time= '('.$time.'Sec)';
            }

            $Array[] = " ".$ran->total_mark."/".$ran->total."   " .$time;

             }

            $downloadExcel[] = $Array;  

        }

        return collect($downloadExcel);
    }
    public function headings(): array
    {

       return [[strtoupper(session('head1')->full_name)],[session('head1')->title."th",strtoupper(session('head1')->school_name)],session('head')];

    }


    public function styles(Worksheet $sheet)
    {
        return [
  
            1     => ['font' => ['italic' => true,'size' => 18]],
            2     => ['font' => ['bold' => true,'size' => 22]],
           'A'    => ['font' => ['italic' => true]],
           'B1'   => ['font' => ['italic' => true]],
           '2'    => ['font' => ['size' => 12,'bold' => true]]
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
