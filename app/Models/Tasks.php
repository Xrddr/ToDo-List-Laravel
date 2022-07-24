<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = ['title_task', 'description_task', 'important_task', 'completed_task'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
