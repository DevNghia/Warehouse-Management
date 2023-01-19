<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;
    protected $calculator_id = 0;
    protected $calculator_name = "calculatorName";
    protected $updated_at = 2023;
    protected $created_at = 2023;
}
