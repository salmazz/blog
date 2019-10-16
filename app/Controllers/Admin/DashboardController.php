<?php
namespace App\Controllers\Admin;
use Phplite\Validator\Validate;
use App\Models\Admin;
use Phplite\Cookie\Cookie;
use Phplite\Http\Request;
use Phplite\Session\Session;

class DashboardController {
    /**
     * Admin login page
     *
     * @return \Phplite\View\View
     */
    public function index() {
        return auth('admins')->user_name;
    }
    /**
     * Admin login page
     *
     * @return \Phplite\Url\Url
     */
    public function submit() {
        Validate::validate([
            'user_name' => 'required|min:6|max:191',
            'password' => 'required|min:6|max:191',
            'remember' => 'in:on',
        ]);
        $admin = Admin::where('user_name', '=', Request::post('user_name'))->first();
        if (! $admin) {
            Session::setFlash('message', 'The user is not found');
            Session::setFlash('old', Request::all());
            return redirect(previous());
        }
        if (! password_verify(Request::post('password'), $admin->password)) {
            Session::setFlash('message', 'The user is not found');
            Session::setFlash('old', Request::all());
            return redirect(previous());
        }
        Request::post('remember') == 'on' ? Cookie::set('admins', $admin->id) : Session::set('admins', $admin->id);
        return redirect(url('admin-panel/dashboard'));
    }
    /**
     * Logout Admin
     *
     * @return \Phplite\Url\Url
     */
    public function logout() {
        Cookie::remove('admins');
        Session::remove('admins');
        return redirect(url('/admin-panel/'));
    }
}