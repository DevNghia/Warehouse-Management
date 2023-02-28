<?php

namespace App\Exports;

use App\Models\XuatkhoCT;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportPX implements FromCollection, WithMapping, WithHeadings
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
        return XuatkhoCT::where('mapx', $this->id)->with('suppliers', 'products')->get();
    }
    public function map($export): array
    {
        return [
            $export->mapx,
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
            'Mã Phiếu xuất',
            'Tên sản phẩm',
            'Tên nhà cung cấp',
            'Số lượng',
            'Tổng tiền',
        ];
    }
}
