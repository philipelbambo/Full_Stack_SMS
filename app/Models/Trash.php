<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trash extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_type',
        'model_id',
        'user_id',
        'title',
        'reason',
        'payload',
        'deleted_at',
    ];

    protected $casts = [
        'payload' => 'array',
        'deleted_at' => 'datetime',
    ];
}
