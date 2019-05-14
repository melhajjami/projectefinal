<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\friendship;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Crypt;
use Illuminate\Database\Eloquent\Model;

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
        $usuarilogin = Auth::user();
        //DONADA ID (encriptada per que usuari no pugui modificar url) D'USUARI RETORNA VISTA DE PERFIL AMB INFO DE L'USUARI
        $id = Crypt::decrypt($id);
        $user = User::where('id', $id)->firstOrFail();
        //acabar de mirar aixo..............fer de alguna manera comprovar si id de perfil que estem intentant clicar tingui com a parella id usuari login a la base de dades
        // $friendship = friendship::whereIn('user1_id', $id)->orwhere('user2_id', $id)->first();
        $friendship = friendship::where(function ($query) use ($usuarilogin,$id) {
            $query->where('user1_id', $usuarilogin->id)
                ->where('user2_id', $id);
        })->orWhere(function($query) use ($usuarilogin,$id) {
            $query->where('user1_id', $id)
                ->where('user2_id', $usuarilogin->id);	
        })->first();
        return view('profile',array('user'=>$user,'friendship'=>$friendship));
    }
}