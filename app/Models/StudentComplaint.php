<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentComplaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'title',
        'description',
    ];
}
