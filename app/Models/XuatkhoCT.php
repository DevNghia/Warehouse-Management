<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class XuatkhoCT extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'mapx', 'product_id', 'supplier_id', 'soluong', 'tongtien'
    ];
    protected $table = 'xuatkho_c_t_s';
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
