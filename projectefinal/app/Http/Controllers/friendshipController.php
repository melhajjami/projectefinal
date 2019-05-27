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
        // USUARI QUE ENVIA LA SOLICITUD
        $friendship = new Friendship;
        $friendship->user1_id = $request->sender;
        $friendship->user2_id = $request->receptor;
        $friendship->save();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function show($id)
    {
        //array amb friendship on participa usuari indicat
        // $friendship = friendship::where('actiu',1)->where('user1_id',$id)->orwhere('user2_id',$id)->get();
        $friendship = friendship::where('actiu',1)->where(function ($query) use ($id) {
            $query->where('user1_id', $id);
        })->orWhere(function($query) use ($id) {
            $query->where('user2_id', $id);
        })->get();
        
        return $friendship;
        
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
        //SOLICITUD ACCEPTADA, LA RELACIO PASSA A ESTAR ACTIVA (ACTIU = 1)
        $friendship = friendship::where('user1_id',$id)->where('user2_id',$request->usuarilogin)->first();

        $friendship->actiu = 1;
        $friendship->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $user = Auth::user();
        //SOLICITUD DECLINADA, S'ESBORRA LA RELACIO
        $friendship = friendship::where(function ($query) use ($request,$id) {
            $query->where('user1_id', $id)->where('user2_id',$request->id);
        })->orWhere(function($query) use ($request,$id) {
            $query->where('user2_id', $id)->where('user1_id',$request->id);	
        })->first();
        
        $friendship->delete();
    }
}
