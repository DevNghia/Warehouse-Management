<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{

    public function AuthLogin()
    {
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/login')->send();
        }
    }
    public function show_all()
    {
        $this->AuthLogin();
        $all_product_type = ProductType::all();
        return view('admin.product_type.all_product_type')->with(compact('all_product_type'));
    }
    public function add_product_type()
    {
        $this->AuthLogin();
        return view('admin.product_type.add_product_type');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $product_type = new ProductType;
        $product_type->product_type_name = $data['product_type_name'];
        $product_type->note = $data['note'];
        $product_type->created_at = now();
        $product_type->save();
        Session()->put('message', 'Thêm loại sản phẩm phẩm thành công!');
        return Redirect::to('/show-product-type');
        // $manager_product_type = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        // return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
    }

    public function edit($product_type_id)
    {
        $product_type = ProductType::where('product_type_id', $product_type_id)->first();
        return view('admin.product_type.edit_product_type')->with(compact('product_type'));
    }
    public function update(Request $request, $product_type_id)
    {
        $product_type = ProductType::find($product_type_id);
        $product_type->updated_at = now();
        $product_type->update($request->all());
        return Redirect::to('/show-product-type');
    }


    public function destroy(ProductType $productType)
    {
        //
    }
}
