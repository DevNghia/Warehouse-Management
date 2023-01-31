<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'role_name', 'role_title'
    ];
    protected $primaryKey = "role_id";
    protected $table = 'roles';
}
