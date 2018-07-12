<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$user = Auth::user();
    	return view('profile.index',['user' => $user]);
    }

    public function updateUser(Request $request){
    	$user = Auth::user();

        if($request->file('photo') != null){
            $path = $request->file('photo')->store('uploads');
            $user->photo = $path;
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;

        if($user->save()){
            flash('Profile updated')->success();
        }

        return redirect()->route('profile');
    }

    public function changePassword(Request $request){
        $user = Auth::user();

        if(Hash::check($request->current_password, $user->password)){
            if($request->new_password == $request->confirm_password){
                $user->password = bcrypt($request->new_password);
                $user->save();

                flash('Password changed')->success();
            }
        }

        return redirect()->route('profile');
    }
}
