<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class time extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_id', 'class_Id','medium_id','section_id','timeslot_id','subject_id','day'
    ];
}
