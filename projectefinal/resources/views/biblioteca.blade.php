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
<div class="container" id="app">
    <h1>Biblioteca</h1>
    <div class="row">

        @forelse($biblioteca as $joc)
        <div class="col">
        <div class="card" id="fila" style="width: 18rem;">
  <a href="{{route('jocs.show',Crypt::encrypt($joc->id))}}"><img class="card-img-top" src="{{$joc->img}}"></a>
  <div class="card-body">
    <a href="{{route('jocs.show',Crypt::encrypt($joc->id))}}"><h5 class="card-title text-light">{{$joc->nom}}</h5></a>
    <p class="card-text text-light">{{$joc->descripcio}}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item text-dark">Temps jugat: {{$joc->tempsjugat}} minuts</li>
    <li class="list-group-item text-dark">Puntuació: {{$joc->puntuacio}}</li>
    <li class="list-group-item text-dark">
    @foreach($bibliotecaamics as $bib)
                    @foreach($bib as $bib)
                    @if($bib->id_joc == $joc->id)
                    <a class="amicslink" href="{{route('perfil.show',Crypt::encrypt(App\Http\Controllers\userController::show($bib->id_usuari)->id))}}">
                        <div id="fotousuaris" style="background-image: url({{App\Http\Controllers\userController::show($bib->id_usuari)->fotoperfil}})">&nbsp</div>
                    </a>
                    <p class="amics">{{App\Http\Controllers\userController::show($bib->id_usuari)->nickname}}</p>
                    @endif
                    @endforeach
                    @endforeach
    </li>
  </ul>
  <div class="card-body">
    <button class="btn btn-dark" v-on:click="obrirjoc({{$joc->id}})">Jugar</button>
  </div>
</div>

</div>

        @empty
        <h1>Encara no tens cap joc, compra el primer <a id="tenda" href="{{route('jocs.index')}}">aqui!</a></h1>
        @endforelse
    </div>
</div> 
@endsection