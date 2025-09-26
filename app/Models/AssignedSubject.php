<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_name',
        'subject_name',
        'course',
        'semester',
    ];
}
