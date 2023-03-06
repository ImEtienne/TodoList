<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'todolist';
    public $timestamps = false;

    protected $fillable = ['id','nom', 'created_at', 'updated_at'];
}
