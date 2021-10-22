<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependant extends Model
{
    use HasFactory;

    protected $fillable =[
        'member_id','firstname','lastname','relationship_id','gender','category'
    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }
}