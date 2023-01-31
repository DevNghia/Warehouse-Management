<?php

use Illuminate\Support\Facades\Redirect;

function AuthLogin()
{

    $admin_id = Session()->get('admin_id');
    if ($admin_id) {
        return Redirect::to('/dashboard');
    } else {
        return Redirect::to('/login')->send();
    }
}
