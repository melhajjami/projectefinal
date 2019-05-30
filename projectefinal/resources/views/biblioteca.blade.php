@extends("layouts.plantilla")
@push('styles')
<link href="{{ asset('css/biblioteca.css') }}" rel="stylesheet">
@endpush
@section("contingut")

<!-- a -->
<div class="wrapper" id="app">
  <!-- al registrar.. mirar RegistersUsers.php -->
  @if ($message = Session::get('success'))
  <!-- The Modal -->
  <div id="registre" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <p>TENS 10 MONEDES ETC ETC </p>
    </div>
  </div>
  @endif
  <div id="frame" class="container frames">

  </div>
  <div class="container" id="biblioteca">
    <h1>Biblioteca</h1>
    <br>
    <div class="row">

      @forelse($biblioteca as $joc)
      <div class="col-md-4">
        <div class="card" id="fila" style="width: ;">
          <a href="{{route('jocs.show',Crypt::encrypt($joc->id))}}"><img class="card-img-top" src="{{$joc->img}}"></a>
          <div class="card-body">
            <a href="{{route('jocs.show',Crypt::encrypt($joc->id))}}">
              <h5 class="card-title text-light">{{$joc->nom}}</h5>
            </a>
            <p class="card-text text-light">{{$joc->descripcio}}</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item gris">Temps jugat: <span id="{{$joc->id}}">{{$joc->tempsjugat}}</span> segons</li>
            <li class="list-group-item gris">Puntuació:
              @switch($joc->puntuacio)
              @case(0)
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              @break
              @case(1)
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              @break
              @case(2)
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              @break
              @case(3)
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              @break
              @case(4)
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
              @break
              @case(5)
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              @break
              @endswitch
            </li>
            <li class="list-group-item text-dark gris">
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
            <button class="btn btn-dark" v-on:click="obrirjoc({{$joc->id}},'{{$joc->identificador}}',{{session()->get('usuarilogin')->id}})">Jugar</button>
          </div>
        </div>
      </div>
      @empty
      <div class="container">
        <div class="jumbotron" style="color:black">
          <h1>Oops!</h1>
          <p>Encara no tens cap joc, compra el primer <a id="tenda" href="{{route('jocs.index')}}">aqui!</p>
        </div>
      </div>
      @endforelse
    </div>
  </div>
</div>
@endsection