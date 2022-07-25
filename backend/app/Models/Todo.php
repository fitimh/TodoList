<?php

namespace App\Models;

use App\Models\TodoTags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'status', //per make a done 
        'notes',
        'favorite'


    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    protected $with = ['tags'];


    public function tags()
    {
        return $this->hasMany(TodoTags::class, 'todo_id', 'id');
    }
}
