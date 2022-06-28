<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exammanagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id', 'date','class_id','subject_id','lesson_id','board_id','medium_id','category_id'
    ];

}
