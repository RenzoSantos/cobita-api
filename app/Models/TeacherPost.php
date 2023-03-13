<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherPost extends Model
{
    use HasFactory;

    protected $table = 'Announcement';
    protected $fillable=[
        'teacher_id',
        'title',
        'text',
    ];
}
