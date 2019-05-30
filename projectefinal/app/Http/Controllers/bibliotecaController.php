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
            'jocs.identificador',
            'jocs.nom',
            'jocs.img',
            'jocs.descripcio',
            'jocs.preu',
            'bibliotecas.tempsjugat',
            'bibliotecas.puntuacio'
        )->join('jocs', 'jocs.id', '=', 'bibliotecas.id_joc')
            ->where('bibliotecas.id_usuari', $user->id)
            ->get();
        $amics = app('App\Http\Controllers\friendshipController')->show($user->id);

        $usuarisamics = [];

        foreach ($amics as $amic) {
            if ($amic->user1_id == $user->id) {
                array_push($usuarisamics, User::where('id', $amic->user2_id)->with('biblioteca')->first());
            } elseif ($amic->user2_id == $user->id) {
                array_push($usuarisamics, User::where('id', $amic->user1_id)->with('biblioteca')->first());
            }
        }
        $bibliotecaamics = [];

        foreach ($usuarisamics as $amic) {
            $bibliotecaamic = $this->show($amic->id);
            array_push($bibliotecaamics, $bibliotecaamic);
        }

        return view('biblioteca', array('biblioteca' => $biblioteca, 'bibliotecaamics' => $bibliotecaamics));
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
        //COMPRAR JOCS

        //obtenim id usuari login
        $usuarilogin = User::where('id', $request->usuari)->first();

        //obtenim id del joc que vol comprar
        $joc = joc::where('id', $request->joc)->first();
        //comprovem si te suficient saldo, sino retorna boolea error
        if ($usuarilogin->saldo < $joc->preu) {
            return -1;
        } else {
            //posem el joc a la biblioteca
            $biblioteca = new biblioteca;
            $biblioteca->id_usuari = $usuarilogin->id;
            $biblioteca->id_joc = $joc->id;
            $biblioteca->save();
            //restem saldo de l'usuari i el guardem a la BBDD
            $usuarilogin->saldo = $usuarilogin->saldo - $joc->preu;
            $usuarilogin->save();
            //retornem el saldo per que el vue el posi canvii en pantalla 
            return $usuarilogin->saldo;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $biblioteca = biblioteca::where('id_usuari', $id)->get();

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
        // MODIFICAR TEMPS JUGAT BIBLIOTECA
        $biblioteca = biblioteca::where('id_usuari', $request->idusuari)->where('id_joc', $id)->first();

        $biblioteca->tempsjugat = $biblioteca->tempsjugat + $request->tempsjugat;

        $biblioteca->save();
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
