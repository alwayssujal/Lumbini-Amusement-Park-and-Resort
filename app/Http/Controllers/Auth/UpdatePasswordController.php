<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{


    /**
     * Where to redirect users when the intended url fails.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updatepassword(Request $request){
        $request->validate([
            'oldpassword'=> 'required|min:8|max:50',
            'newpassword'=> 'required|min:8|max:50',
            'confirmpassword'=> 'required|same:newpassword'
        ]);
        $currentuser= auth()->user();
        if(Hash::check($request->oldpassword, $currentuser->password)){

            User::where('id', $currentuser->id)->update([
                'password'=>Hash::make($request->newpassword)
            ]);
            return redirect()->back()->with('success', 'Password successfully updated');
        }
        else{
            return redirect()->back()->with('error', 'old password does not match');
        }
    }
}
