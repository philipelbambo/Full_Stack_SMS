<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentComplaint extends Model
{
    use HasFactory;

    protected $table = 'student_complaints';

    protected $fillable = [
        'student_name',
        'complaint',   // replace/add any other columns your table has
        'status',
        'created_at',
        'updated_at'
    ];
}
