<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'supplier_name', 'supplier_email', 'supplier_phone', 'supplier_website'
    ];
    protected $primaryKey = "supplier_id";
    protected $table = 'suppliers';
}
