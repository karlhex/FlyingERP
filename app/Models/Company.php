<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Person;
use App\Models\BankAccount;
use App\Models\FlyingModel;

class Company extends FlyingModel
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'site',
        'phone',
        'email',
        'business_person_id',
        'tech_person_id',
        'account_id'
    ];

    public function businessPerson() {
       return $this->belongsTo(Person::class, 'business_person_id');
    }

    public function techPerson() {
       return $this->belongsTo(Person::class, 'tech_person_id');
    }

    public function account() {
       return $this->belongsTo(BankAccount::class, 'account_id');
    }

    public function taxInfo() {
       return $this->belongsTo(BankAccount::class, 'tax_info_id');
    }
}
