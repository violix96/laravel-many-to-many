<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function projects() //N post
    {
        return $this->hasMany(project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


//principale 
