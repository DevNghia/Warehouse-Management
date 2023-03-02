<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use App\Models\Xuatkho;
use App\Exports\ExportPX;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\XuatkhoCT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
            alert()->error('Error', 'Mã phiếu xuất đã tồn tại');
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
                    $estimatesAdd['created_at']   =  now();
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
    public function print_order($checkout_code)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));

        return $pdf->stream();
    }
    public function print_order_convert($checkout_code)
    {
        $phieunhapct = XuatKhoCT::where('mapx', $checkout_code)->get();
        $phieunhap = XuatKho::where('mapx', $checkout_code)->first();
        $get = XuatKhoCT::where('mapx', $checkout_code)->select("*", DB::raw("SUM(tongtien) as tong"))
            ->groupBy(DB::raw("mapx"))
            ->first();
        $output = '';
        $output .= '<style>body{
			font-family: DejaVu Sans;
		}
        .abc{text-align:center}
		.table-styling{
			border:1px solid #000;
		}
		.table-styling tbody tr td{
			border:1px solid #000;
		}
		</style>
		<h2><center>Công ty TNHH một thành viên ABCD</center></h2>
		<h4><center>Chi tiết phiếu xuất hàng</center></h4>
		<p>Mã đơn hàng: ' . $phieunhap->mapx . ' </p>
        <span>Người xuất hàng: ' . $phieunhap->admins->admin_name . ' </span><br> 
        <span>Nội dung xuất hàng:' . $phieunhap->note . ' </span><br>
        <span>Ngày tạo: ' . $phieunhap->created_at . '</span>
        ';
        $output .= '				
				</tbody>
			
		<p>Đơn hàng đặt</p>
			<table class="table-styling">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên sản phẩm</th>
						<th>Nhà cung cấp</th>
						<th>Số lượng</th>
						<th>Đơn giá</th>
						<th>Tổng tiền</th>
					</tr>
				</thead>
                
				<tbody>';
        $i = 1;
        foreach ($phieunhapct as $key => $product) {

            $output .= '		
					<tr>
						<td>' . $i++ . '</td>
						<td>' . $product->products->product_name . '</td>
						<td>' . $product->suppliers->supplier_name . '</td>
                        <td>' . $product->soluong . '</td>
                        <td>' . number_format($product->products->import_price, 0, ',', '.') . 'đ' . '</td>
                        <td>' . number_format($product->tongtien, 0, ',', '.') . 'đ' . '</td>
						
					</tr> 
                    ';
        }
        $output .= '				
				</tbody>
			
		</table>';
        $output .= '
            <span>Tổng giá trị xuất: ' . number_format($get->tong, 0, ',', '.') . 'đ' . ' </span><br>
            <h3>Người xuất hóa đơn</h3>
                <span>(Ký rõ họ tên)</span>
        ';
        return $output;
    }
}
