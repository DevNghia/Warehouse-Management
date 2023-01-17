<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\ProductType;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\BinaryOp\Equal;

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
    public function show_all(Request $request)
    {
        $this->AuthLogin();
        $key = $request->keyword_submit;
        $all_product_type = ProductType::paginate(4);
        if ($key = $request->keyword_submit) {
            $all_product_type = ProductType::where('product_type_name', 'like', '%' . $key . '%')->paginate(4);
            $all_product_type;
        }


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
        $check = ProductType::where('product_type_name', $data['product_type_name'])->first();
        if ($check) {
            session()->flash('warrning', 'Loại sản phẩm đã tồn tại!');
            return Redirect::back();
        } else {
            $product_type->save();
            Session()->put('message', 'Thêm loại sản phẩm phẩm thành công!');
            return Redirect::to('/show-product-type');
        }

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
        Session()->put('message', 'Cập nhật loại sản phẩm phẩm thành công!');
        return Redirect::to('/show-product-type');
    }

    public function destroy($product_type_id)
    {
        $product_type = ProductType::find($product_type_id);
        $product_type->delete();
        Session()->put('error', 'Xóa loại sản phẩm phẩm thành công!');
        return Redirect::to('/show-product-type');
    }
}
