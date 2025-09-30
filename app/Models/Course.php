<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'code',
        'instructor_name',
        'credits',
        'duration_weeks',
        'is_active',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments', 'course_id', 'student_id')
                    ->withPivot('enrolled_at', 'status')
                    ->withTimestamps();
    }
}
