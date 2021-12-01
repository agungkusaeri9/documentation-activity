<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile.index',[
            'title' => 'Profil Saya',
            'item' => auth()->user()
        ]);
    }

    public function update()
    {
        request()->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email'],
            'avatar' => ['image','mimes:jpg,jpeg,png']
        ]);

        $user = auth()->user();

        if(request('password')){
            $password = bcrypt(request('password'));
        }else{
            $password = $user->password;
        }

        if(request()->file('avatar')){
            Storage::disk('public',$user->avatar);
            $avatar = request()->file('avatar')->store('user','public');
        }else{
            $avatar = $user->avatar;
        }

        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => $password,
            'avatar' => $avatar
        ]);

        return redirect()->back()->with('success','Profile berhasil disimpan');
    }
}
