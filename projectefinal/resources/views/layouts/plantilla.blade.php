<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SteamWeb</title>

  <!-- ICONES -->
  <!-- <link href="{{asset('icones/fontawesome-free/css/all.min.css')}}" rel="stylesheet"/> NO FUNCIONA-->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- <link href="{{asset('css/all.min.css')}}" rel="stylesheet" /> NO NECESSARI DE MOMENT -->

  <!-- BOOTSTRAP -->
  <!-- <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" /> NO FUNCIONA -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  <!-- CSS DEL SIDEBAR -->
  <link href="{{asset('css/prova.css')}}" rel="stylesheet" />


  
</head>

<body>
  <style>a{
    display:block;
  }
  #fotousuarilogin{
    width: 25px;
    height: 25px;
    display:inline-block;
    border-radius: 100%;
    background: #eee no-repeat center;
    background-size: cover;
    margin-right:10x;
    background-image: url({{session()->get('usuarilogin')->fotoperfil}});
  }
  #fotousuaris{
    width: 25px;
    height: 25px;
    display:inline-block;
    border-radius: 100%;
    background: #eee no-repeat center;
    background-size: cover;
    margin-right:10px;
  }
  </style>
@php
use App\Http\Controllers\friendshipController;
use App\Http\Controllers\Auth\LoginController;
session(['pendingfriendships' => friendshipController::invitacions()]);
LoginController::usuarilogin();
@endphp

<div class="nav-side-menu" id="app">

    <!-- TITOL -->
    <div class="brand"><h3>hehehe</h3></div>

    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
    <div class="menu-list">

      <ul id="menu-content" class="menu-content collapse out">

        <!-- SUBMENUS: -->

        <!-- Submenu Biblioteca -->

        <li>
          <a href="{{route('biblioteca.index')}}"> <i class="fa fa-list-alt fa-lg"></i> Biblioteca</a>
        </li>

        <!-- Submenu Tenda -->
        <li data-toggle="collapse" data-target="#products" data-parent="menu-content" class="collapsed">
          <a href="#"><i class="fa fa-shopping-cart fa-lg"></i> Tenda <span class="arrow"></span></a>
        </li>

        <ul class=" collapse" id="products">
            <li><a href="{{route('jocs.index')}}">Jocs</a></li>
        </ul>

        <!--  Submenu Invitacions d'amistat -->

        <li data-toggle="collapse" data-target="#config" data-parent="menu-content" class="collapsed">
          <a href="#"><i class="fa fa-cogs fa-lg"></i> Invitacions d'amistat <span class="arrow"></span></a>
        </li>

        <ul class=" collapse" id="config">
          @foreach(session()->get('pendingfriendships') as $usuari)
            <li><a href="{{route('perfil.show',Crypt::encrypt($usuari->user1_id))}}"><div id="fotousuaris" style="background-image: url({{$usuari->user->fotoperfil}});"></div>{{$usuari->user->nickname}}</a><a id="boto" href="#button" class="btn btn-primary" v-on:click="acceptarsolicitud({{$usuari->user->id}},{{session()->get('usuarilogin')->id}})">Acceptar</a><a id="boto" href="#button" class="btn btn-primary" v-on:click="declinarsolicitud({{$usuari->user->id}},{{session()->get('usuarilogin')->id}})">Declinar</a></li>
          @endforeach
        </ul>

        <!-- Submenu Perfil -->

        <li data-toggle="collapse" data-target="#usuari" data-parent="menu-content" class="collapsed">
        <a href="#"><div id="fotousuarilogin" ></div> {{session()->get('usuarilogin')->nickname}} <span class="arrow"></span></a>
        </li>

        <ul class=" collapse" id="usuari">
            <li><a href="{{route('perfil.show', Crypt::encrypt(session()->get('usuarilogin')->id))}}">Perfil</a></li>
            <li><a href="{{route('users.edit', session()->get('usuarilogin')->id)}}">Editar perfil</a></li>
            <li><a href="{{ url('/logout') }}"> logout </a></li>
        </ul>

      </ul>
      
    </div>

</div>
<div id="yo"></div>

<div id="contingut">
  @yield("contingut")
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