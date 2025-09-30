<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClub extends Model
{
    use HasFactory;

    protected $table = 'student_clubs';

    protected $fillable = [
        'student_name',
        'club_name',
        'role',
        'description',
        'start_date',
        'end_date',
        'is_current'
    ];
}
