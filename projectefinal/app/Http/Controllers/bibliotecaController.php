<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\biblioteca;
use App\joc;
use App\friendship;
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
        // $biblioteca = biblioteca::where('id_usuari', $user->id)->get();
        // $biblioteca = DB::table('bibliotecas')->select(
        //     'jocs.id',
        //     'jocs.nom',
        //     'jocs.img',
        //     'jocs.descripcio',
        //     'jocs.preu',
        //     'bibliotecas.tempsjugat',
        //     'bibliotecas.puntuacio'
        // )->join('jocs', 'jocs.id', '=', 'bibliotecas.id_joc')
        // ->where('bibliotecas.id_usuari',$user->id)
        // ->get();
        $biblioteca = biblioteca::where('id_usuari',$user->id)->with('jocs')->get();
        $friendship = app('App\Http\Controllers\friendshipController')->show($user->id);
            
        
            //ACABAR DE FER... SABER USUARIS QUE SON AMICS I QUE TENEN EL MATEIX JOC


        return view('biblioteca',array('biblioteca'=>$biblioteca,'friendship'=>$friendship));
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
