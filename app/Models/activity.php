<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    use HasFactory;

    protected $table = 'Activity';

    protected $fillable = [
        'activity',
        'detail',
        'output',
        'score',
        'points',
        'teacher_id',
        'grade',
        'section',
    
    ];
    
}
