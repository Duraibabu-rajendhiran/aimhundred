<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{

    use HasFactory;
    protected $fillable = [
        'subject_id',
        'student_id',
        'total',
        'correct',
        'wrong',
        'class_id',
        'school_id',
        'marks',
        'time_left',
        'date',
        'lesson_id',
        'medium_id'       
    ];
}
