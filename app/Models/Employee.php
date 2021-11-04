<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\WorkExperience;
use App\Models\ProjectExperience;
use App\Models\Education;
use App\Models\Certificate;
use App\Models\FlyingModel;
use App\Traits\WithSelectOption;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends FlyingModel
{
    use HasFactory;
    use SoftDeletes;
    use WithSelectOption;

    protected $guarded = ['id'];

    public function work_experiences()
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function project_experiences()
    {
        return $this->hasMany(ProjectExperience::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

}
