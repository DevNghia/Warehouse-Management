<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'calculation_name'
    ];
    protected $primaryKey = "calculation_id";
    protected $table = 'calculations';
}
