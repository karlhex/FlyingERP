<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectExperience extends Model
{
    use HasFactory;

    protected $table = 'project_experiences';
    protected $fillable = ['sequence','start_date', 'end_date', 'project', 'role'];
}
