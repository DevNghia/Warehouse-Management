<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin;
use Illuminate\Http\Request;
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
        return view('admin.account.add');
    }
    public function store(Request $request)
    {
        $data = $request->all();

        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->created_at = now();
        $check = admin::where('admin_name', $data['admin_name'])->first();
        if ($check) {
            session()->flash('warrning', 'Đơn vị tính đã tồn tại!');
            return Redirect::back();
        } else {
            $admin->save();
            Session()->put('message', 'Thêm đơn vị tính thành công!');
            return Redirect::to('/show-admin');
        }
    }
    public function show_dashboard()
    {
        AuthLogin();
        return view('admin.dashboard');
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
    public function logout()
    {
        Session()->put('admin_name', null);
        Session()->put('admin_id', null);
        return Redirect::to('/login');
    }
}
