<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        return view('login');
    }
    public function show_all(Request $request)
    {

        AuthLogin();
        $key = $request->keyword_submit;
        $all_admin = Admin::with('roles')->paginate(4);

        if ($key = $request->keyword_submit) {
            $all_admin = Admin::where('admin_name', 'like', '%' . $key . '%')->paginate(4);
        }


        return view('admin.account.all')->with(compact('all_admin'));
    }
    public function add_account()
    {
        AuthLogin();
        $roles = Role::all();
        return view('admin.account.add')->with(compact('roles'));
    }
    public function store(Request $request)
    {
        $data = $request->all();

        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_password = bcrypt($data['admin_password']);
        $admin->role_id = $data['role_id'];
        $admin->created_at = now();
        $check = admin::where('admin_email', $data['admin_email'])->first();
        if ($check) {
            session()->flash('warrning', 'Email đã tồn tại!');
            return Redirect::back();
        } else {
            $admin->save();
            Session()->put('message', 'Thêm tài khoản thành công!');
            return Redirect::to('/show-all-account');
        }
    }
    public function show_dashboard()
    {
        AuthLogin();
        $nhap = DB::table("nhapkho_c_t_s")->sum('soluong');
        $xuat = DB::table("xuatkho_c_t_s")->sum('soluong');
        $product = DB::table("product")->sum('soluong');
        return view('admin.dashboard')->with(compact('product', 'xuat', 'nhap'));
    }
    public function dashboard(Request $request)
    {

        $data = $request->all();
        $admin_email = $data['admin_email'];
        $admin_password = $data['admin_password'];
        $login = Admin::where('admin_email', $admin_email)->first();
        if ($login) {
            if (Hash::check($admin_password, $login->admin_password)) {
                Session()->put('admin_name', $login->admin_name);
                Session()->put('admin_id', $login->admin_id);
                return Redirect::to('/dashboard');
            } else {
                Session()->put('message', 'Mật khẩu hoặc tài khoản bị sai!.Làm ơn nhập lại!');
                return Redirect::to('/login');
            }
        } else {
            Session()->put('message', 'Mật khẩu hoặc tài khoản bị sai!.Làm ơn nhập lại!');
            return Redirect::to('/login');
        }
    }
    public function edit($admin_id)
    {
        $account = Admin::where('Admin_id', $admin_id)->first();
        $roles = Role::all();
        return view('admin.account.edit')->with(compact('account', 'roles'));
    }
    public function update(Request $request, $admin_id)
    {
        $admin = admin::find($admin_id);
        $admin->updated_at = now();
        $admin->update($request->all());
        Session()->put('message', 'Cập nhật tài khoản thành công!');
        return Redirect::to('/show-admin');
    }
    public function logout()
    {
        Session()->put('admin_name', null);
        Session()->put('admin_id', null);
        return Redirect::to('/login');
    }
}
