<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'course_name',
        'grade',
        'completion_date',
    ];
}
