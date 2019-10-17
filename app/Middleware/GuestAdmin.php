<?php

namespace App\Middleware;

use App\Models\Admin;
use Phplite\Cookie\Cookie;
use Phplite\Session\Session;

class GuestAdmin {
    public function handle() {
        $auth = Session::get('admins') ?: Cookie::get('admins');
        if ($auth) {
            $admin = Admin::where('id', '=', $auth)->first();
            if ($admin) {
                return redirect(url('admin-panel/dashboard'));
            }
        }
    }
}