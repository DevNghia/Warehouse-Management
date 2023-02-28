<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImports implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'product_name' => $row[0],
            'product_image' => $row[1],
            'product_type_id' => $row[2],
            'supplier_id' => $row[3],
            'admin_id' => $row[4],
            'calculation_id' => $row[5],
            'import_price' => $row[6],
            'retail_price' => $row[7],
            'wholesale_price' => $row[8],
            'status' => $row[9]
        ]);
    }
}
