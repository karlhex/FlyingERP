<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\FlyingModel;

class ProductInfo extends FlyingModel
{
    use HasFactory;

    protected $fillable=[
        'name',
        'company_name',
        'unit',
        'type',
        'description'
    ];
}
