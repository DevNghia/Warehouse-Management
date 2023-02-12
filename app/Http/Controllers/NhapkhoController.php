<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\Nhapkho;
use App\Models\NhapkhoCT;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class NhapkhoController extends Controller
{
    public function show_all(Request $request)
    {

        AuthLogin();
        $key = $request->keyword_submit;
        $all_phieunhap = Nhapkho::with('admins')->paginate(4);
        if ($key = $request->keyword_submit) {
            $all_product = Nhapkho::where('id', 'like', '%' . $key . '%')->paginate(4);
        }


        return view('admin.phieunhap.all')->with(compact('all_phieunhap'));
    }
    public function show_detail($mapn)
    {
        AuthLogin();
        $detail = NhapkhoCT::where('mapn', $mapn)->with('suppliers', 'products')->get();
        return view('admin.phieunhap.detail')->with(compact('detail'));
    }
    public function add_phieunhap()
    {
        AuthLogin();
        $product = Product::all();
        $supplier = Supplier::all();
        return view('admin.phieunhap.add')->with(compact('supplier', 'product'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $phieunhapAdd = new Nhapkho;
        $phieunhapAdd->mapn = $data['mapn'];
        $phieunhapAdd->content = $data['content'];
        $phieunhapAdd->note = $data['note'];
        $phieunhapAdd->admin_id = Session()->get('admin_id');
        $phieunhapAdd->created_at = now();
        $gianhap = Product::where('product_id', $request->product)->first();;
        $check = Nhapkho::where('mapn', $data['mapn'])->first();
        if ($check) {
            alert()->error('Error', 'Mã phiếu nhập đã tồn tại');
            return Redirect::back();
        } else {
            if (is_array($request->product) || is_object($request->product)) {
                foreach ($request->product as $key => $item) {

                    $estimatesAdd['product_id']  = $request->product[$key];
                    $estimatesAdd['mapn']     = $data['mapn'];
                    $estimatesAdd['supplier_id']     = $request->supplier[$key];
                    $estimatesAdd['soluong']       = $request->soluong[$key];
                    $estimatesAdd['tongtien']             = ($request->soluong[$key]) * $gianhap->import_price;

                    NhapkhoCT::create($estimatesAdd);
                }
            }
            $phieunhapAdd->save();
            alert()->success('Success', 'Nhập hàng thành công');
            return Redirect::to('/show-phieunhap');
        }
    }
}
