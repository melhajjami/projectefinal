<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\friendship;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class friendshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //USUARI QUE ENVIA LA SOLICITUD
        $user = Auth::user();
        $friendship = new Friendship;
        $friendship->user1_id = $user->id;
        $friendship->user2_id = $request->id;
        $friendship->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //array amb friendship on participa usuari indicat
        $friendship = friendship::where('user1_id', $id)->orwhere('user2_id', $id)->get();

        //array per posar els amics de l'usuari indicat 
        $userarray=[];

        //per a cada friendship trobar amic de l'usuari indicat 
        foreach($friendship as $user){
            if($user->user1_id==$id){
                $usuari = User::where('id', $user->user2_id)->get();
                array_push($userarray,$usuari);
            } else if($user->user1_id!=$id) {
                $usuari = User::where('id', $user->user1_id)->get();
                array_push($userarray,$usuari);
            }
        }

        //finalment retorna array amb amics de l'usuari indicat
        return $userarray;
        
    }

    public static function invitacions()
    {
        $user = Auth::user();
        //get relacions de amistat que encara no estan confirmades (actiu 0)
        $friendship = friendship::where('actiu',0)->where('user2_id', $user->id)->with('user')->get();

        return $friendship;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
