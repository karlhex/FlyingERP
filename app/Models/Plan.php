<?php

namespace App\Models;

use App\Traits\WithSelectOption;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Plan extends Model
{
    use HasFactory;
    use WithSelectOption;

    protected $fillable =[
        'sequence',
        'charge_employee_id',
        'action_employee_id',
        'instruction',
        'start_date',
        'end_date',
        'act_start_date',
        'act_end_date',
        'status',
    ];

    public function charge_employee()
    {
        return $this->belongsTo(Employee::class,'charge_employee_id');
    }

    public function action_employee()
    {
        return $this->belongsTo(Employee::class,'action_employee_id');
    }
}
