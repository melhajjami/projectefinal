<!DOCTYPE html>
<html lang="en">
@php
use App\Http\Controllers\friendshipController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\userController;
session(['pendingfriendships' => friendshipController::invitacions()]);
LoginController::usuarilogin();
$amics = friendshipController::show(session()->get('usuarilogin')->id);
@endphp

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Steam2</title>

  <!-- ICONES -->
  <!-- <link href="{{asset('icones/fontawesome-free/css/all.min.css')}}" rel="stylesheet"/> NO FUNCIONA-->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- <link href="{{asset('css/all.min.css')}}" rel="stylesheet" /> NO NECESSARI DE MOMENT -->

  <!-- BOOTSTRAP -->
  <!-- <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" /> NO FUNCIONA -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  <!-- FONTS DE GOOGLEAPIS -->
  <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Karla&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <!-- CSS DEL SIDEBAR -->
  <link href="{{asset('css/plantilla.css')}}" rel="stylesheet" />
  @stack('styles')

</head>

<body>
  <div class="nav-side-menu" id="plantilla">

    <!-- TITOL -->
    <a class="titol" href="{{route('biblioteca.index')}}">
      <div class="brand">
        <h3 class="titol">AM Platform!</h3>
      </div>
    </a>

    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

    <div class="menu-list">

      <ul id="menu-content" class="menu-content collapse out">

        <!-- SUBMENUS: -->

        <!-- Submenu Biblioteca -->

        <li>
          <a href="{{route('biblioteca.index')}}"> <i class="fa fa-list-alt fa-lg"></i> Biblioteca</a>
        </li>

        <!-- Submenu Botiga -->
        <li data-toggle="collapse" data-target="#products" data-parent="menu-content" class="collapsed">
          <a href="#"><i class="fa fa-shopping-cart fa-lg"></i> Botiga <span class="arrow"></span></a>
        </li>

        <ul class=" collapse" id="products">
          <li><a href="{{route('jocs.index')}}"> <i class="fa fa-gamepad"></i> Jocs</a></li>
        </ul>

        <!--  Submenu Invitacions d'amistat -->

        <li data-toggle="collapse" data-target="#config" data-parent="menu-content" class="collapsed">
          <a href="#"><i class="fa fa-bell fa-lg"></i> Invitacions d'amistat <span class="arrow"></span>@if(count(session()->get('pendingfriendships')) > 0)<span class="badge badge-pill badge-danger" id="numeronotificacions">{{count(session()->get('pendingfriendships'))}}</span>@endif</a>
        </li>

        <ul class="collapse" id="config">
          @forelse(session()->get('pendingfriendships') as $usuari)
          <li><a class="user" href="{{route('perfil.show',Crypt::encrypt($usuari->user1_id))}}">
              <div id="fotousuaris" style="background-image: url({{$usuari->user->fotoperfil}})">&nbsp</div>{{$usuari->user->nickname}}
              <a class="botoacceptar" id="{{$usuari->user->id}}" href="#button" v-on:click="acceptarsolicitud({{$usuari->user->id}},{{session()->get('usuarilogin')->id}})">&nbsp</a>
              <a class="botodeclinar" id="{{$usuari->user->id}}" href="#button" v-on:click="declinarsolicitud({{$usuari->user->id}},{{session()->get('usuarilogin')->id}})">&nbsp</a>
            </a>
          </li>
          @empty
          <li>
            <p class="empty">No tens cap sol·licitud d'amistat</p>
          </li>
          @endforelse
        </ul>

        <!-- Amics -->
        <li data-toggle="collapse" data-target="#amics" data-parent="menu-content" class="collapsed">
          <a href="#"><i class="fa fa-users"></i> Amics <span class="arrow"></span></a>
        </li>

        <ul class="collapse" id="amics">
          @forelse($amics as $amic)
          @if($amic->user1_id!=session()->get('usuarilogin')->id)
          @php
          $user = usercontroller::show($amic->user1_id)
          @endphp
          @elseif($amic->user2_id!=session()->get('usuarilogin')->id)
          @php
          $user = userController::show($amic->user2_id)
          @endphp
          @endif
          <li>
            <a class="user" href="{{route('perfil.show',Crypt::encrypt($user->id))}}">
              <div id="fotousuaris" style="background-image:url({{$user->fotoperfil}})">&nbsp</div>{{$user->nickname}}
            </a>
          </li>
          @empty
          <li>
            <p class="empty">No tens cap amic :(</p>
          </li>
          @endforelse
        </ul>

        <!-- Submenu Perfil -->

        <li data-toggle="collapse" data-target="#usuari" data-parent="menu-content" class="collapsed">
          <a href="#">
            <a id="fotousuaris" style="background-image: url({{session()->get('usuarilogin')->fotoperfil}})">&nbsp</a> {{session()->get('usuarilogin')->nickname}} <span class="arrow"></span>
          </a>
        </li>

        <ul class=" collapse" id="usuari">
          <li><a href="{{route('perfil.show', Crypt::encrypt(session()->get('usuarilogin')->id))}}"> <i class=" 	fa fa-user"></i> Perfil</a></li>
          <li><a href="{{route('users.edit', session()->get('usuarilogin')->id)}}"> <i class="fa fa-edit"></i> Editar perfil</a></li>
          <li><a href="{{ url('/logout') }}"> <i class="fa fa-power-off"></i> Tanca la sessió </a></li>
        </ul>
        <p id="saldo">&ensp;Monedes: {{session()->get('usuarilogin')->saldo}}</p>

      </ul>
      <li id="buscar">
        <form action="/search" method="POST" role="search">
          {{ csrf_field() }}
          <div class="input-group">
            <input pattern="{.1}" required type="text" class="form-control" id="cercar" name="q" placeholder="Cercar usuaris/jocs">
            <span class="input-group-btn"></span>
          </div>
        </form>
      </li>
    </div>

  </div>
  <div id="yo"></div>

  <div id="contingut">
    @yield("contingut")
  </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <!-- <script src="{{asset('js/jquery-3.4.0.min.js')}}"></script> NO FUNCIONA -->
  <!-- <script src="{{asset('js/bootstrap.js')}}"></script> NO FUNCIONA -->

  <!-- JavaScript del Bootstrap + JQuery -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="{{asset('js/app.js')}}"></script>

</body>

</html>