<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    // use AuthenticatesUsers;

    // public function username()
    // {
    //     return 'username';
    // }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo;
    public function login(Request $req)
    {
        $credentials = $req->only('username', 'password');
        if (Auth::attempt($credentials)) {

            $req->session()->regenerate();
            switch (Auth::user()->role) {
                case 0:
                    return redirect('/pemohon/index');
                    break;
                case 1:
                    return redirect('/admin/index');
                    break;
                // case 3:
                //     if(Auth::user()->status == 0){
                //         Auth::logout();
                //         return back()->withErrors('Maaf akun anda belum diverifikasi oleh admin');
                //     }
                //     return redirect('/pemohon/beranda');
                //     break;
            }
        }

        return back()->withErrors([
            'username' => 'Username atau password salah',
        ]);

        // return $next($request);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
