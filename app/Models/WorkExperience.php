<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $table = 'work_experiences';

    protected $fillable = [ 'employee_id', 'sequence', 'start_date', 'end_date', 'company', 'department', 'position' ];


    public function replace($input) {

    }
}
