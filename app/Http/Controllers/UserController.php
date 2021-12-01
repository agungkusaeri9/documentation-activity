<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $items = User::orderBy('name','ASC')->get();
        return view('pages.user.index',[
            'title' => 'Data User',
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('pages.user.create',[
            'title' => 'Tambah User'
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required','string','min:3'],
            'username' => ['required','alpha_dash','min:3','unique:users,username'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:5'],
            'avatar' => ['image','mimes:jpg,jpeg,png'],
            'role' => ['required','in:super admin,admin']
        ]);

        $data = request()->all();
        if(request()->file('avatar'))
        {
            $data['avatar'] = request()->file('avatar')->store('user','public');
        }else{
            $data['avatar'] = NULL;
        }
        $data['password'] = bcrypt(request('password'));
        User::create($data);

        return redirect()->route('users.index')->with('success','Admin berhasil disimpan');
    }

    public function edit($id)
    {
        if($id == auth()->id())
        {
            return redirect()->route('users.index');
        }
        $item = User::findOrFail($id);
        return view('pages.user.edit',[
            'title' => 'Edit User',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        if($id == auth()->id())
        {
            return redirect()->route('users.index');
        }
        request()->validate([
            'name' => ['required','string','min:3'],
            'username' => ['required','alpha_dash','min:3',Rule::unique('users','username')->ignore($id)],
            'email' => ['required','email',Rule::unique('users','email')->ignore($id)],
            'avatar' => ['image','mimes:jpg,jpeg,png'],
            'role' => ['required','in:super admin,admin']
        ]);

        $item = User::findOrFail($id);
        $data = request()->all();
        if(request()->file('avatar'))
        {
            Storage::disk('public')->delete($item->avatar);
            $data['avatar'] = request()->file('avatar')->store('user','public');
        }else{
            $data['avatar'] = $item->avatar;
        }

        if(request('password'))
        {
            request()->validate([
                'password' => ['min:5']
            ]);
            $data['password'] = bcrypt(request('password'));
        }else{
            $data['password'] = $item->password;
        }
        $item->update($data);

        return redirect()->route('users.index')->with('success','Admin berhasil disimpan');
    }

    public function destroy($id)
    {
        $item = User::findOrFail($id);
        Storage::disk('public')->delete($item->avatar);
        $item->delete();
        return redirect()->route('users.index')->with('success','Admin berhasil dihapus');
    }

}

