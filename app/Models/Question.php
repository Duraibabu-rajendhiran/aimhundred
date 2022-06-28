<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'answer',
        'board_id',
        'subject_id',
        'lesson_id',
        'medium_id',
        'class_id',
        'question_image',
        'option_image_1',
        'option_image_2',
        'option_image_3',
        'option_image_4',
        'answer_image',
        'academic_id'
    ];
}
