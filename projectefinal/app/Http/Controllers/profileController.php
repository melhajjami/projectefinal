<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Crypt;

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
            'email' => 'required|email|unique:users,email,'.$iduser
        ]);
        
            // $user = Auth::user();
            $user = User::findOrFail($iduser);
            $user->nom = $request->name;
            $user->email = $request->email;
        // $user->password = bcrypt($request('password'));
        $user->save();

        return back();
    }
    public function show($id){
        //DONADA ID (encriptada per que usuari no pugui modificar url) D'USUARI RETORNA VISTA DE PERFIL AMB INFO DE L'USUARI
        $id = Crypt::decrypt($id);
        $user = User::where('id', $id)->firstOrFail();
        return view('profile')->with('user',$user);
    }
}