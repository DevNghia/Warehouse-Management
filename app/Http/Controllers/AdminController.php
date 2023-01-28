<?php

namespace App\Http\Controllers;

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
