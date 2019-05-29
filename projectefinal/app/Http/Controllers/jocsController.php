<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\joc;
use App\User;
use App\biblioteca;
use Illuminate\Support\Facades\Auth;
use App\comentari;
use \Crypt;

class jocsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //RETORNAR TOTS ELS JOCS AMB LA VISTA DE LA TENDA
        $jocs = joc::withCount('comentari')->get();
        $ranking = $this->getRank();
        $numerocomentaris = 0;

        return view('shop',array('jocs'=>$jocs,'ranking'=>$ranking));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

        //DONADA ID JOC, RETORNAR VISTA AMB EL JOC PER COMPRAR
        $id = Crypt::decrypt($id);
        $usuarilogin = Auth::user();
        $biblio = biblioteca::where('id_usuari', $usuarilogin->id)->where('id_joc', $id)->first();
        $joc = joc::where('id', $id)->firstOrFail();
        //GET TOTS ELS COMENTARIS + USUARI DONADA ID DE JOC 
        $comentaris = comentari::where('joc_id', $id)->with('user')->get();
        //obtenim la biblioteca de l'usuari per a saber quins jocs te
        $biblioteca = biblioteca::where('id_usuari',$usuarilogin->id)->get();
        $tejoc = null;
        foreach($biblioteca as $jocbib){
            if($jocbib->id_joc == $joc->id){
                $tejoc = $jocbib;
            }
        }
        return view('product',['joc'=> $joc,'comentaris'=>$comentaris,'tejoc'=>$tejoc, 'biblio'=>$biblio]);
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

    public function getRank()
    {
        $taula = joc::orderBy('puntuacio', 'DESC')->get();

        return $taula;
    }
}
