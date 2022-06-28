<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionImport implements ToModel, WithHeadingRow
{
 
    public function model(array $row)
    {

        return new Question([
            'title' => $row['title'],
            'option_1' => $row['option_1'],
            'option_2' => $row['option_2'],
            'option_3' => $row['option_3'],
            'option_4' => $row['option_4'],
            'answer'   => $row['answer'],
            'board_id' => session('board'),
            'academic_id' => session('academic'),
            'subject_id' => session('subject'),
            'lesson_id' => session('lesson'),
            'medium_id' => session('medium'),
            'class_id' => session('class')
        ]);
        
    }
}