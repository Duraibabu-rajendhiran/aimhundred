<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'from','to','updated'
    ];
    protected $casts = [ 'id' => 'string' ];
}
