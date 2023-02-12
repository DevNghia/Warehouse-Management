<?php

namespace App\Http\Controllers;

use App\Models\Nhapkho;
use App\Models\NhapkhoCT;

use Illuminate\Http\Request;
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
        $all_product = NhapkhoCT::select(DB::raw('nhapkho_c_t_s.*, SUM(nhapkho_c_t_s.soluong-xuatkho_c_t_s.soluong) as amount'))
            ->leftJoin('xuatkho_c_t_s', 'xuatkho_c_t_s.product_id', '=', 'nhapkho_c_t_s.product_id')
            ->groupBy('product_id')
            ->get();
        return view('admin.kho.all')->with(compact('all_product'));
    }
}
