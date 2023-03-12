<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $table = 'score';
    protected $fillable =[
        'student_id' ,
        'activity_id' ,
        'name',
        'activity' ,
        'detail' ,
        'output' ,
        'points' ,
        'score' ,
        'answer' ,
        'teacher_id' ,
        'grade' ,
        'section' ,
    ];

}
