<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\biblioteca;
use App\friendship;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Crypt;
use Illuminate\Database\Eloquent\Model;
use Hash;

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
            'name' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'oldpassword' => 'sometimes|max:50',
            'newpassword' => 'required_with:oldpassword|confirmed',
            'avatar' => 'max:255',
            'background' => 'max:255'
        ],[
            'name.required' => 'Necessites un nom',
            'name.min' => 'El nom ha de tenir un mínim de 3 caràcters!',
            'name.max' => 'El nom ha de tenir un maxim de 50 caràcters!',
            'surname.required' => 'Necessites un cognom',
            'surname.min' => 'El cognom ha de tenir un mínim de 3 caràcters!',
            'surname.max' => 'El cognom ha de tenir un maxim de 50 caràcters!',
            'newpassword.confirmed' => 'Les contrasenyes no coincideixen!',
            'newpassword.required_with' => 'No vols una nova contrassenya?'
        ]);

        $user = User::findOrFail($iduser);

        if (Hash::check($request->oldpassword, $user->password)) {

            $user->nom = $request->name;

            $user->fill([
             'password' => Hash::make($request->newpassword)
             ])->save();
            
            $user->save();
            $request->session()->flash('success', 'Password changed');
            return redirect()->route('jocs.index');
 
         } else {
            
            $user->nom = $request->name;
            $user->cognom = $request->surname;
            $user->fotoperfil = $request->avatar;
            $user->background = $request->background;

            $user->save();
            
            return redirect()->route('perfil.show',['id'=>Crypt::encrypt($iduser)]);
         }

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
        session(['usuarilogin' => Auth::user()]);
        //biblioteca de l'usuari amb la info dels jocs
        $biblioteca = biblioteca::where('id_usuari',$id)->with('jocs')->get();
        return view('profile',array('user'=>$user,'friendship'=>$friendship,'biblioteca'=>$biblioteca));
    }
}