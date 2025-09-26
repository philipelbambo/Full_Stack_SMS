<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'subject_code',
        'subject_title',
        'subject_description',
        'subject_lab_unit',
        'subject_lec_unit',
        'subject_total_unit',
        'department_id',
    ];  

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // 🔗 Subject has many enrollments
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    // 🔗 Subject can have many students through enrollments
    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments');
    }
}
