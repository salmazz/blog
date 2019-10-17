<?php
namespace App\Controllers\Admin;
use App\Models\Admin;
use Phplite\Cookie\Cookie;
use Phplite\Http\Request;
use Phplite\Session\Session;
use Phplite\Validation\Validate;
class AuthController {
    /**
     * Admin login page
     *
     * @return \Phplite\View\View
     */
    public function index() {
        $title = "Admin Login";
        return view('admin.auth.login', ['title' => $title]);
    }
    /**
     * Admin login
     *
     * @return \phplite\Url\Url
     */
    public function submit() {
        Validate::validate([
            'user_name' => 'required|min:4|max:191',
            'password' => 'required|min:6|max:191',
            'remember' => 'in:on',
        ], false);
        $admin = Admin::where('user_name', '=', Request::post('user_name'))->first();
        if (! $admin) {
            Session::set('message', 'The user is not found');
            Session::set('old', Request::all());
        return redirect(url('admin-panel/dashboard'));
    }
        if (! password_verify(Request::post('password'), $admin->password)) {
            Session::set('message', 'The user is not found');
            Session::set('old', Request::all());
            return redirect(previous());
        }
        Request::post('remember') == 'on' ? Cookie::set('admins', $admin->id) : Session::set('admins', $admin->id);


        return redirect(url('admin-panel/dashboard'));
    }
    /**
     * Logout admin
     *
     * @return \Phplite\Url\Url
     */
    public function logout() {
        Cookie::remove('admins');
        Session::remove('admins');
        return redirect(url('admin-panel'));
    }
}