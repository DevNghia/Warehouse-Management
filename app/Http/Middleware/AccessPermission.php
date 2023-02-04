<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccessPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $admin_id = Session::get('admin_id');
        if (Admin::find($admin_id) && Admin::find($admin_id)->hasRoles('admin')) {
            return $next($request);
        }
        return redirect('/dashboard')->with([
            'message' => 'Bạn không có quyền truy cập vào trang này',
            'alert-type' => 'error'
        ]);
    }
}
