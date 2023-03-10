<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

date_default_timezone_set('Asia/Jakarta');

class UserController extends Controller
{
   
    public function index()
    {
        $users = User::all(); 
        $user = Auth::user();

        return view('user', compact('user', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

   
    public function register(Request $request)
    {
        User::create([
            'username'   => $request ->username,
            'name'       => $request ->name,
            'email'      => $request ->email,
            'password'   => Hash::make($request->password),
            'level'      => $request->level,
        ]);
        return redirect('/dashboard')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->username   = $request->username;
        $user->name       = $request->name;
        $user->email      = $request->email;
        $user->password   = Hash::make($request->password);
        $user->level      = $request->level;
        
        $user->save();

        return redirect('/user')->with('success', 'Data Berhasil Di ubah');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect('/user')->with('success', 'Data Berhasil Di hapus');
    }
}
