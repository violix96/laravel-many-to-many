<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function project()
    {
        return $this->belongsToMany(Technology::class, 'project_technology', 'project_id', 'technology_id');
    }
}
