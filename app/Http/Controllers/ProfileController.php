<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /***
     * for profile page
     * showing profile page with retriving user data from database
    ***/

    public function index(){

        // fetch user data from database
        $user = User::findOrFail(auth()->user()->id);

        return view('profile.index', ['user' => $user]);
    }

    /***
     * for profile update
     * after update redirect to profile page
    ***/

    public function update(Request $request){

        $user = User::findOrFail(auth()->user()->id);

        if($user->email == null){
            // email is empty

            // validate data
            $request->validate([
                'email' => 'nullable|email|unique:users'
            ]);

            // fetch and update user data from database
            
            $user->email = $request->email;
            $user->update();

            return redirect()->route('profile')->with('message', 'Profile updated');
        }else{
            // email aready exist
            return redirect()->route('profile')->with('message', 'Nothing to update');
        }

        
    }
}
