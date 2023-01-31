<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    public function show_all(Request $request)
    {

        AuthLogin();
        $key = $request->keyword_submit;
        $all_supplier = Supplier::paginate(4);
        if ($key = $request->keyword_submit) {
            $all_supplier = Supplier::where('supplier_name', 'like', '%' . $key . '%')->paginate(4);
        }

        return view('admin.supplier.all')->with(compact('all_supplier'));
    }
    public function add_supplier()
    {
        AuthLogin();
        return view('admin.supplier.add');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $supplier = new Supplier;
        $supplier->supplier_name = $data['supplier_name'];
        $supplier->supplier_email = $data['supplier_email'];
        $supplier->supplier_phone = $data['supplier_phone'];
        $supplier->supplier_website = $data['supplier_website'];
        $supplier->created_at = now();
        $check = Supplier::where('supplier_name', $data['supplier_name'])->first();
        if ($check) {
            session()->flash('warrning', 'nhà cung cấp đã tồn tại!');
            return Redirect::back();
        } else {
            $supplier->save();
            Session()->put('message', 'Thêm nhà cung cấp thành công!');
            return Redirect::to('/show-supplier');
        }
    }

    public function edit($supplier_id)
    {
        $supplier = Supplier::where('supplier_id', $supplier_id)->first();
        return view('admin.supplier.edit')->with(compact('supplier'));
    }
    public function update(Request $request, $supplier_id)
    {
        $supplier = Supplier::find($supplier_id);
        $supplier->updated_at = now();
        $supplier->update($request->all());
        Session()->put('message', 'Cập nhật nhà cung cấp thành công!');
        return Redirect::to('/show-supplier');
    }

    public function destroy($supplier_id)
    {
        $supplier = Supplier::find($supplier_id);
        $supplier->delete();
        Session()->put('error', 'Xóa nhà cung cấp thành công!');
        return Redirect::to('/show-supplier');
    }
}
