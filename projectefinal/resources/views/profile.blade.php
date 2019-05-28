@extends("layouts.plantilla")
@push('styles')
<link href="{{ asset('css/perfil.css') }}" rel="stylesheet">
<style>
  #image1 {
    background-image: url({{$user->fotoperfil}});
  }

  #banner {
    background-image:url({{$user->background}});
  }
</style>
@endpush
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

<body class="profile-page sidebar-collapse">
  @section("contingut")

  <div class="wrapper">
    <!-- The Modal -->
    <div id="popup" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <div class="row">
          <div class="col">Jocs
            <ul class="list-group text-dark">
              @forelse($jocs as $joc)
              @foreach($joc as $joc)
              <li class="list-group-item"><a style="display:inline-block" href="{{route('jocs.show',Crypt::encrypt($joc->id))}}">
                  <div id="fotojocs" style="background-image: url({{$joc->img}})">&nbsp</div>
                </a> {{$joc->nom}}</li>
              @endforeach
              @empty
              <p>Aquest usuari enara no té cap joc </p>
              @endforelse


            </ul>
          </div>

          <div class="col">Amics
            <ul class="list-group">
              @forelse($amics as $amic)
              @if($amic->user1_id!=session()->get('usuarilogin')->id)
              <li class="list-group-item"><a style="display:inline-block" href="{{route('jocs.show',Crypt::encrypt(App\Http\Controllers\userController::show($amic->user1_id)->id))}}">
                  <div id="fotousuaris" style="background-image: url({{App\Http\Controllers\userController::show($amic->user1_id)->fotoperfil}})">&nbsp</div>
                </a>{{App\Http\Controllers\userController::show($amic->user1_id)->nickname}}</li>
              @elseif($amic->user2_id!=session()->get('usuarilogin')->id)
              <li class="list-group-item"><a style="display:inline-block" href="{{route('jocs.show',Crypt::encrypt(App\Http\Controllers\userController::show($amic->user2_id)->id))}}">
                  <div id="fotousuaris" style="background-image: url({{App\Http\Controllers\userController::show($amic->user2_id)->fotoperfil}})">&nbsp</div>
                </a>{{App\Http\Controllers\userController::show($amic->user2_id)->nickname}}</li>
              @endif
              @empty
              <p>Aquest usuari no té amics</p>
              @endforelse
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="page-header">
      <div id="overlay" class="page-header-image">
      </div>
      <div id="banner" class="page-header-image" data-parallax="true">
      </div>
      <div class="container">
        <div id="image1" class="cropcircle photo-container"></div>
        <h3 class="title">{{$user->nickname}}</h3>
        <p class="category">{{$user->nom}} {{$user->cognom}}</p>
        <div class="content">
          <a href="#" id="botopopup">
            <div class="social-description">
              <h2>{{count($biblioteca)}}</h2>
              <p>Jocs</p>
            </div>
            <div class="social-description">
              <h2>{{count($amics)}}</h2>
              <p>Amics</p>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div id="botozindex" class="section">
      <div class="container" id="app">
        @if($user->id != session()->get('usuarilogin')->id)
        <div class="button-container">
          @if($friendship != null)
          @if($friendship->actiu == 0)
          @if($friendship->user1_id == session()->get('usuarilogin')->id)
          <a id="boto" href="#button" class="btn btn-primary btn-round btn-lg disabled" disabled>Solicitud enviada</a>
          @else
          <a id="botoprofile" href="#button" class="btn btn-primary btn-round btn-lg" v-on:click="acceptarsolicitud({{$user->id}},{{session()->get('usuarilogin')->id}})">Acceptar</a>
          <a id="botoprofile" href="#button" class="btn btn-primary btn-round btn-lg" v-on:click="declinarsolicitud({{$user->id}},{{session()->get('usuarilogin')->id}})">Declinar</a>
          @endif
          @elseif($friendship->actiu == 1)
          <a id="boto" href="#button" class="btn btn-primary btn-round btn-lg" v-on:click="declinarsolicitud({{$user->id}},{{session()->get('usuarilogin')->id}})">Deixar de ser amics</a>
          @endif
          @elseif($friendship == null)
          <a id="boto" href="#button" class="btn btn-primary btn-round btn-lg" v-on:click="enviarsolicitud({{$user->id}},{{session()->get('usuarilogin')->id}})">Enviar solucitud d'amistat</a>
        </div>
        @endif
        @endif
        @endsection
</body>