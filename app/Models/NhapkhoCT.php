<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhapkhoCT extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'mapn', 'product_id', 'supplier_id', 'soluong', 'tongtien', 'created_at'
    ];
    protected $table = 'nhapkho_c_t_s';
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
