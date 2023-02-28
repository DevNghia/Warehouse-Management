<?php

namespace App\Http\Controllers;

use App\Models\Nhapkho;
use App\Models\NhapkhoCT;
use App\Models\Product;
use App\Models\XuatkhoCT;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class WarehouseController extends Controller
{
    public function show_all(Request $request)
    {

        AuthLogin();
        $key = $request->keyword_submit;

        // $all_product = NhapkhoCT::select([
        //     'product_id',
        //     DB::raw('SUM(soluong) as amount')
        // ])
        //     ->groupBy('product_id')
        //     ->with('products')
        //     ->get();
        // if ($key = $request->keyword_submit) {
        //     $all_product = Product::where('product_name', 'like', '%' . $key . '%')->paginate(4);
        // }
        // $all_product = DB::table('nhapkho_c_t_s')
        //     ->join('xuatkho_c_t_s', 'nhapkho_c_t_s.product_id', '=', 'xuatkho_c_t_s.product_id')
        //     ->sum('nhapkho_c_t_s.soluong')->get();
        // $all_product = NhapkhoCT::select(DB::raw('nhapkho_c_t_s.*, SUM(nhapkho_c_t_s.soluong-xuatkho_c_t_s.soluong) as amount'))
        //     ->leftJoin('xuatkho_c_t_s', 'xuatkho_c_t_s.product_id', '=', 'nhapkho_c_t_s.product_id')
        //     ->groupBy('product_id')
        //     ->get();
        $all_product = Product::with('calculations')->get();
        return view('admin.kho.all')->with(compact('all_product'));
    }
    public function filter_by_date(Request $request)
    {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $get = NhapkhoCT::select("*", DB::raw("SUM(soluong) as user_count"))
            ->groupBy(DB::raw("date(created_at)"))
            ->get();

        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'soluongn' => $val->user_count,
                'created_at' => $val->created_at,

            );
        }

        echo $data = json_encode($chart_data);
    }
    public function filter_by_date2(Request $request)
    {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get1 = XuatkhoCT::whereBetween('created_at', [$from_date, $to_date])->select("*", DB::raw("SUM(soluong) as user_count"))
            ->groupBy(DB::raw("date(created_at)"))
            ->get();
        foreach ($get1 as $key => $val) {
            $chart_data1[] = array(
                'soluongx' => $val->user_count,
                'created_at' => $val->created_at,

            );
        }
        echo $data = json_encode($chart_data1);
    }
    public function days_nhap()
    {
        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = NhapkhoCT::whereBetween('created_at', [$sub30days,  $now])->select("*", DB::raw("SUM(soluong) as user_count"))
            ->groupBy(DB::raw("date(created_at)"))
            ->get();
        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'soluongn' => $val->user_count,
                'created_at' => $val->created_at,

            );
        }
        echo $data = json_encode($chart_data);
    }
    public function days_xuat()
    {
        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = XuatkhoCT::whereBetween('created_at', [$sub30days,  $now])->select("*", DB::raw("SUM(soluong) as user_count"))
            ->groupBy(DB::raw("date(created_at)"))
            ->get();
        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'soluongx' => $val->user_count,
                'created_at' => $val->created_at,

            );
        }
        echo $data = json_encode($chart_data);
    }
}
