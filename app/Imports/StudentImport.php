<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class StudentImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Student([
            
            'full_name' => $row['full_name'],
            'father' => $row['father'],
            'date_of_birth' => $row['date_of_birth'],
            'phone' => $row['phone'],
            'address' => $row['address'],
            
            'board_id' => session('board'),
            'academic_year' => session('academic'),
            'class_id' => session('class'),
            'section_id' => session('section'),
            'medium_id' => session('medium'),
            'school_id' => session('school'),
            'device_id' => session('device_id'),
            'deleted_id' => session('deleted_id'),
            'device_type' => session('device_type'),
    

        ]);
    }
}
