<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\joc;
use App\User;
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
        $jocs = joc::all();
        return view('shop')->with('jocs',$jocs);
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
        $joc = joc::where('id', $id)->firstOrFail();
        //GET TOTS ELS COMENTARIS + USUARI DONADA ID DE JOC 
        $comentaris = comentari::where('joc_id', $id)->with('user')->get();
        

        return view('product',['joc'=> $joc,'comentaris'=>$comentaris]);
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
