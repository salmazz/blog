<?php

namespace App\Middleware;

use App\Models\Admin;
use Phplite\Cookie\Cookie;
use Phplite\Session\Session;

class AuthAdmin {
    public function handle() {
        $auth = Session::get('admins') ?: Cookie::get('admins');
        if (! $auth) {
            return redirect(url('admin-panel'));
        }
        $admin = Admin::where('id', '=', $auth)->first();
        if (! $admin) {
            return redirect(url('admin-panel'));
        }
    }
}