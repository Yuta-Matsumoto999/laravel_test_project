<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/sale';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('user');
    }

    // ログイン画面
    public function showLoginForm()
    {
        return view('auth.user.login');
    }

    public function getTwitterAuth() {
        return Socialite::driver('twitter')->redirect();
    }

    public function getTwitterAuthCallback() {
        $user = Socialite::driver('twitter')->user();
        $authUser = $this->findOrCreateTwitterUser($user);
        Auth::guard('user')->login($authUser, true);
 
        return redirect()->route('sale.index');
    }

    private function findOrCreateTwitterUser($twitterUser)
    {
        $authUser = User::where('twitter_id', $twitterUser->id)->first();
        if ($authUser){
            return $authUser;
        }
 
        return User::create([
            'name' => $twitterUser->nickname, 
            'twitter_id' => $twitterUser->id,
            'twitter_name' => $twitterUser->nickname, 
            'avatar' => $twitterUser->avatar_original
        ]);
    }


    // ログアウト処理
    public function logout(Request $request)
    {
        $this->guard('user')->logout();
        $request->session()->invalidate();

        return redirect('/sale');
    }
}
