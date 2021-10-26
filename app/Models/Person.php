<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\FlyingModel;

class Person extends FlyingModel
{
    use HasFactory;

    protected $fillable=['name','phone1','phone2','phone3','email','company_name','department','position'];
}
