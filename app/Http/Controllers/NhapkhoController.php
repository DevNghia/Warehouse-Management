<?php

namespace App\Http\Controllers;

use App\Exports\ExcelExports;

use Illuminate\Support\Facades\Redirect;
use App\Models\Nhapkho;
use App\Models\NhapkhoCT;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\App;

use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

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

                    $estimatesAdd['created_at']   =  now();
                    NhapkhoCT::create($estimatesAdd);
                    $product = Product::find($estimatesAdd['product_id']  = $request->product[$key]);
                    DB::table('product')->where('product_id',   $estimatesAdd['product_id']  = $request->product[$key])->update(['soluong' => ($estimatesAdd['soluong']  = $request->soluong[$key]) + $product->soluong]);
                }
            }
            $phieunhapAdd->save();
            alert()->success('Success', 'Nhập hàng thành công');
            return Redirect::to('/show-phieunhap');
        }
    }
    public function export_csv($mapn)
    {
        return FacadesExcel::download(new ExcelExports($mapn), 'chitietphieunhap1.xlsx');
    }
    public function print_order($checkout_code)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));

        return $pdf->stream();
    }
    public function print_order_convert($checkout_code)
    {
        $phieunhapct = NhapkhoCT::where('mapn', $checkout_code)->get();
        $phieunhap = Nhapkho::where('mapn', $checkout_code)->first();
        $get = NhapkhoCT::where('mapn', $checkout_code)->select("*", DB::raw("SUM(tongtien) as tong"))
            ->groupBy(DB::raw("mapn"))
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
		<h4><center>Chi tiết phiếu nhập hàng</center></h4>
		<p>Mã đơn hàng: ' . $phieunhap->mapn . ' </p>
        <span>Người nhập hàng: ' . $phieunhap->admins->admin_name . ' </span><br> 
        <span>Nội dung nhập hàng:' . $phieunhap->note . ' </span><br>
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
            <span>Tổng giá trị nhập: ' . number_format($get->tong, 0, ',', '.') . 'đ' . ' </span><br>
            <h3>Người nhập hóa đơn</h3>
                <span>(Ký rõ họ tên)</span>
        ';
        return $output;
    }
}
