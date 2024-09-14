<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GitAuthController extends Controller
{
    /***
     * for github login
     * redirected github login
    ***/
    public function login(){
        return Socialite::driver('github')->redirect();
    }


    /***
     * for github login callback
     * called after successful github login
    ***/
    public function callback(){
        $githubUser = Socialite::driver('github')->user();
 
        $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ], [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
            'password' => bcrypt('password'),
        ]);
    
        Auth::login($user);
    
        return redirect()->route('dashboard');
    }
}
