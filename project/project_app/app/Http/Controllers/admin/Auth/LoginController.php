<?php

namespace App\Http\Controllers\admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    // ログイン画面
    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    // ログアウト処理
    public function logout(Request $request)
    {
        $this->guard('user')->logout();
        $request->session()->invalidate();
        return redirect()->to('/admin');
    }

}

