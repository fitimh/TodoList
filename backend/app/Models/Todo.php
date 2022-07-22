<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'notes'
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];
}
