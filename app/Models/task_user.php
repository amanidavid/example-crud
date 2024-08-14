<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task_user extends Model
{
    use HasFactory;
    
    protected $table = 'task_users';

    protected $fillable =[
        'user_id',
        'works_id'
    ];
}
