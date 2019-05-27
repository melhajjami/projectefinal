@extends("layouts.plantilla")
@push('styles')
    <link href="{{ asset('css/biblioteca.css') }}" rel="stylesheet">
@endpush
@section("contingut")
<!-- al registrar.. mirar RegistersUsers.php -->
@if ($message = Session::get('success'))
<h1>gola</h1>
@endif
<!-- a -->
<div class="container">
    <div class="container" id="app">
        <h1>Biblioteca</h1>
        <div class="row">
    
            @forelse($biblioteca as $joc)
            <div class="col-md-6">
                <div class="well well-sm">
                    <div id="fila">
                        <div class="col-xs-3 col-md-3 text-center">
                            <a href="{{route('jocs.show',Crypt::encrypt($joc->id))}}"><img src="{{$joc->img}}" alt="yy" class="img-rounded img-responsive" id="fotobiblioteca" width="114" height="114" /></a>
                        </div>
                        <div>
                            <a href="{{route('jocs.show',Crypt::encrypt($joc->id))}}">
                                <h2>{{$joc->nom}}</h2>
                            </a>
                            <p>{{$joc->descripcio}}</p>
                            <p>Temps jugat:</p>
                            <p>{{$joc->tempsjugat}} minuts</p>
                            <div class="col-md-12">
                                <button class="btn btn-dark" v-on:click="obrirjoc({{$joc->id}})">Jugar</button>
                            </div>
                            @foreach($bibliotecaamics as $bib)
                            @foreach($bib as $bib)
            @if($bib->id_joc == $joc->id)
            <a class="amicslink" href="{{route('perfil.show',Crypt::encrypt(App\Http\Controllers\userController::show($bib->id_usuari)->id))}}"><div id="fotousuaris" style="background-image: url({{App\Http\Controllers\userController::show($bib->id_usuari)->fotoperfil}})">&nbsp</div></a><p class="amics">{{App\Http\Controllers\userController::show($bib->id_usuari)->nickname}}</p>
            @endif
            @endforeach
            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <h1>Encara no tens cap joc, compra el primer <a id="tenda" href="{{route('jocs.index')}}">aqui!</a></h1>
            @endforelse
        </div>
    </div>
</div>
@endsection