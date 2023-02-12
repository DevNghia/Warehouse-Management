<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'product_name', 'product_image', 'product_type_id', 'supplier_id', 'admin_id', 'import_price', 'retail_price', 'wholesale_price', 'status'
    ];
    protected $primaryKey = "product_id";
    protected $table = 'product';
    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public function product_types()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }
    public function admins()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function calculations()
    {
        return $this->belongsTo(Calculation::class, 'calculation_id');
    }
}
