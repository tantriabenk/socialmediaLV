<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\User;
use Session;    

class ProfilesController extends Controller
{
    public function index($slug){
        $user = user::where('slug', $slug)->first();
        return view('profiles.profile')
            ->with('user', $user);
    }


    public function edit(){
        return view('profiles.edit')->with('info', Auth::user()->profile);
    }

    public function update(Request $r){
        // dd($r->all());

        $this->validate($r, [
            'location' => 'required',
            'about' => 'required|max:255'
        ]);

        Auth::user()->profile()->update([
            'location' => $r->location,
            'about' => $r->about
        ]);

        if($r->hasFile('avatar')){
            Auth::user()->update([
                'avatar' => $r->avatar->store('public/avatars')
            ]);
        }

        // dd(Auth::user()->profile);

        Session::flash('success', 'Profile updated.');
        return redirect()->back();
    }

}
