<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'admin_name', 'admin_email', 'admin_phone', 'admin_password'
    ];
    protected $primaryKey = "admin_id";
    protected $table = 'admin';
    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function hasRoles($role)
    {
        return  $this->roles()->where('role_name', $role)->first();
    }
}
