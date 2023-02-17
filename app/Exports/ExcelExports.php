<?php

namespace App\Exports;

use App\Models\NhapkhoCT;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExcelExports implements FromCollection, WithMapping, WithHeadings
{
    protected $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return NhapkhoCT::where('mapn', $this->id)->with('suppliers', 'products')->get();
    }
    public function map($export): array
    {
        return [
            $export->mapn,
            $export->products->product_name,
            $export->suppliers->supplier_name,
            $export->soluong,
            $export->tongtien,
        ];

        //     return $members->all();
        // }
    }
    public function headings(): array
    {
        return [
            'Mã Phiếu nhập',
            'Tên sản phẩm',
            'Tên nhà cung cấp',
            'Số lượng',
            'Tổng tiền',
        ];
    }
}
