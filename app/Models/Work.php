<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_name', 
        'description', 
        'start_date', 
        'due_date', 
        'status', 
        'created_by'
    ];

    public function assigner()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relationship with users (assignees)
    public function assignees()
    {
        return $this->belongsToMany(User::class, 'task_users', 'works_id', 'user_id');
    }
    
}
