<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nhapkho extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'mapn', 'content', 'admin_id',
    ];
    protected $primaryKey = "id";
    protected $table = 'nhapkhos';
    public function admins()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
