<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->except('login');
    }

    /***
     * for login page
     * showing login method / form
    ***/
    public function login(){
        return view('auth.login');
    }


    /***
     * for user logout
     * redirect to login page after logout
    ***/
    public function logout(){
        // clear session
        \Session::flush();
        // clear cache
        Cache::clear();
        // logout function
        Auth::logout();

        return redirect()->route('login');
    }
}
