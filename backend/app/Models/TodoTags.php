<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoTags extends Model
{
    protected $fillable = ['todo_id', 'tag'];

    public function todo()
    {
        return $this->belongsTo(Todo::class, 'todo_id');
    }
}
