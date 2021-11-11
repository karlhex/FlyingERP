<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\fw_Contract;
use App\Models\Employee;

class ProjectRole extends Model
{
    use HasFactory;

    /**
     *  Mass Assignment.
     */
    protected $guarded = ['id'];


    public function project()
    {
        return $this->belongsTo(fw_Contract::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
