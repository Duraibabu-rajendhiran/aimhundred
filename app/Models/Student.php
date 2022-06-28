<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name','father','class_id','section_id','medium_id','school_id','board_id','phone','address',
        'deleted_id','academic_year','device_id','device_type','device_token','profile_image','date_of_birth'
    ];
}
