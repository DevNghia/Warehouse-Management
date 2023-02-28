<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Imports\ExcelImports;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class ProductController extends Controller
{
    public function show_all(Request $request)
    {

        AuthLogin();
        $key = $request->keyword_submit;
        $all_product = Product::with('suppliers', 'product_types', 'admins', 'calculations')->paginate(4);
        if ($key = $request->keyword_submit) {
            $all_product = Product::where('product_name', 'like', '%' . $key . '%')->paginate(4);
        }


        return view('admin.product.all')->with(compact('all_product'));
    }
    public function add_product()
    {
        AuthLogin();
        $all_product = Product::with('suppliers', 'product_types', 'admins', 'calculations')->get();
        $product_type = ProductType::all();
        $supplier = Supplier::all();
        $calculation = Calculation::all();
        return view('admin.product.add')->with(compact('all_product', 'product_type', 'supplier', 'calculation'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $product = new Product;
        $product->product_name = $data['product_name'];
        $product->product_type_id = $data['product_type'];
        $product->supplier_id = $data['supplier'];
        $product->admin_id = Session()->get('admin_id');
        $product->calculation_id = $data['calculation'];
        $product->import_price = $data['import_price'];
        $product->retail_price = $data['retail_price'];
        $product->wholesale_price = $data['wholesale_price'];
        $product->status = $data['status'];
        $product->soluong = 0;
        $product->tongtien =  0;
        $product->created_at = now();
        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('upload/product', $new_image);
            $product->product_image = $data['product_image'] = $new_image;
            $product->save();
            alert()->success('Success', 'Thêm sản phẩm thành công');
            return Redirect::to('/show-product');
        }
        $data['product_image'] = '';
        $check = Product::where('product_name', $data['product_name'])->first();
        if ($check) {
            session()->flash('warrning', 'Loại sản phẩm đã tồn tại!');
            return Redirect::back();
        } else {
            $product->save();
            alert()->success('Success', 'Thêm sản phẩm thành công');
            return Redirect::to('/show-product');
        }
    }

    public function edit($product_id)
    {
        $product = Product::where('product_id', $product_id)->first();
        $product_type = ProductType::all();
        $supplier = Supplier::all();
        return view('admin.product.edit')->with(compact('product', 'product_type', 'supplier'));
    }
    public function update(Request $request, $product_id)
    {
        $product = Product::find($product_id);
        $product->updated_at = now();
        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('upload/product', $new_image);
            $product->product_image = $data['product_image'] = $new_image;
            $product->save();
            alert()->success('Success', 'Thêm sản phẩm thành công');
            return Redirect::to('/show-product');
        }
        $product->update($request->all());
        Session()->put('message', 'Cập nhật sản phẩm phẩm thành công!');
        return Redirect::to('/show-product');
    }

    public function destroy($product_id)
    {
        $product = Product::find($product_id);
        $product->delete();
    }
    public function import_product(Request $request)
    {
        $path = $request->file('file')->getRealPath();
        FacadesExcel::import(new ExcelImports, $path);
        return back();
    }
}
