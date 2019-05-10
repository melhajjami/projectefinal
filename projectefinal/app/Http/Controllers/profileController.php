<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use \Illuminate\Http\Request;

class profileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {   
        $user = Auth::user();
        return view('editprofile', compact('user'));
    }

    public function update(Request $request, $iduser)
    { 
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users'
        ]);
        
        //$user = Auth::user();
            $user = User::findOrFail($iduser);
        $user->nom = $request->name;
        $user->email = $request->email;
        // $user->password = bcrypt($request('password'));
        $user->save();

        return back();
    }
    public function carregarperfil(){
        
    }
}