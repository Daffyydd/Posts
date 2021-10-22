<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dependants(){
        return $this->hasMany(Dependant::class);
    }

    public function beneficiaries(){
        return $this->hasMany(Beneficiary::class);
    }

    public function salutation(){
        return $this->hasOne(Salutation::class);
    }
}