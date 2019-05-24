<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\biblioteca;
use App\joc;
use App\friendship;
use App\User;
use Illuminate\Support\Facades\Auth;


class bibliotecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //DONADA ID DE USUARI, RETORNAR ELS JOCS QUE TÉ + TEMPS JUGAT I PUNTUACIO QUE ESTAN EN LA TAULA BIBLIOTECA
        $user = Auth::user();
        $biblioteca = biblioteca::where('id_usuari', $user->id)->get();
        $biblioteca = DB::table('bibliotecas')->select(
            'jocs.id',
            'jocs.nom',
            'jocs.img',
            'jocs.descripcio',
            'jocs.preu',
            'bibliotecas.tempsjugat',
            'bibliotecas.puntuacio'
        )->join('jocs', 'jocs.id', '=', 'bibliotecas.id_joc')
        ->where('bibliotecas.id_usuari',$user->id)
        ->get();
        $amics = app('App\Http\Controllers\friendshipController')->show($user->id);

        $usuarisamics=[];

        foreach($amics as $amic){
            if($amic->user1_id == $user->id){
                array_push($usuarisamics,User::where('id',$amic->user2_id)->with('biblioteca')->first());
            } elseif($amic->user2_id == $user->id){
                array_push($usuarisamics,User::where('id',$amic->user1_id)->with('biblioteca')->first());
            }
        }
        // $bibliotecaamics = [];

        // foreach($usuarisamics as $amic){
        //     $bibliotecaamic = $this->show($amic->id);
        //     array_push($bibliotecaamics,$bibliotecaamic);
        // }

        return view('biblioteca',array('biblioteca'=>$biblioteca,'bibliotecaamics'=>$usuarisamics));
    }
    
    /**
     * Show the form for creating a new resource.
     *
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
        $biblioteca = biblioteca::where('id_usuari', $request->idusuari)->where('id_joc', $request->idjoc)->first();

        $biblioteca->tempsjugat = $request->tempsjugat;

        $biblioteca->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $biblioteca = biblioteca::where('id_usuari',$id)->get();
    
        return $biblioteca;
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
