<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use App\Models\Xuatkho;
use App\Exports\ExportPX;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\XuatkhoCT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class XuatkhoController extends Controller
{
    public function show_all(Request $request)
    {

        AuthLogin();
        $key = $request->keyword_submit;
        $all_phieuxuat = Xuatkho::with('admins')->paginate(4);
        if ($key = $request->keyword_submit) {
            $all_product = Xuatkho::where('id', 'like', '%' . $key . '%')->paginate(4);
        }


        return view('admin.phieuxuat.all')->with(compact('all_phieuxuat'));
    }
    public function show_detail($mapx)
    {
        AuthLogin();
        $detail = XuatkhoCT::where('mapx', $mapx)->with('suppliers', 'products')->get();

        return view('admin.phieuxuat.detail')->with(compact('detail'));
    }
    public function add_phieuxuat()
    {
        AuthLogin();
        $product = Product::all();
        $supplier = Supplier::all();
        return view('admin.phieuxuat.add')->with(compact('supplier', 'product'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $phieuxuatAdd = new Xuatkho;
        $phieuxuatAdd->mapx = $data['mapx'];
        $phieuxuatAdd->content = $data['content'];
        $phieuxuatAdd->note = $data['note'];
        $phieuxuatAdd->admin_id = Session()->get('admin_id');
        $phieuxuatAdd->created_at = now();
        $gianhap = Product::where('product_id', $request->product)->first();;
        $check = Xuatkho::where('mapx', $data['mapx'])->first();
        if ($check) {
            alert()->error('Error', 'Mã phiếu nhập đã tồn tại');
            return Redirect::back();
        } else {
            if (is_array($request->product) || is_object($request->product)) {
                foreach ($request->product as $key => $item) {
                    $product = Product::find($estimatesAdd['product_id']  = $request->product[$key]);
                    $estimatesAdd['product_id']  = $request->product[$key];
                    $estimatesAdd['mapx']     = $data['mapx'];
                    $estimatesAdd['supplier_id']     = $request->supplier[$key];
                    $estimatesAdd['soluong']       = $request->soluong[$key];
                    $estimatesAdd['tongtien']             = ($request->soluong[$key]) * $gianhap->import_price;
                    if (($estimatesAdd['soluong'] = $request->soluong[$key]) > ($product->soluong)) {
                        alert()->error('Error', 'Số lượng sản phẩm không đủ');
                        return Redirect::to('/add-phieuxuat');
                    } else {
                        XuatkhoCT::create($estimatesAdd);
                        DB::table('product')->where('product_id',   $estimatesAdd['product_id']  = $request->product[$key])->update(['soluong' => ($product->soluong) - ($estimatesAdd['soluong']  = $request->soluong[$key])]);
                    }
                }
            }
            $phieuxuatAdd->save();
            alert()->success('Success', 'xuât hàng thành công');
            return Redirect::to('/show-phieuxuat');
        }
    }
    public function export_csv($mapx)
    {
        return FacadesExcel::download(new ExportPX($mapx), 'chitietphieuxuat.xlsx');
    }
}
