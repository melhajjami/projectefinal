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

<div class="nav-side-menu">

    <!-- TITOL -->
    <div class="brand"><h3>Steam 2</h3></div>

    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
    <div class="menu-list">

      <ul id="menu-content" class="menu-content collapse out">

        <!-- SUBMENUS: -->

        <!-- Submenu Biblioteca -->

        <li>
          <a href="#"> <i class="fa fa-list-alt fa-lg"></i> Biblioteca</a>
        </li>

        <!-- Submenu Tenda -->

        <li data-toggle="collapse" data-target="#products" data-parent="menu-content" class="collapsed active">
          <a href="#"><i class="fa fa-shopping-cart fa-lg"></i> Tenda <span class="arrow"></span></a>
        </li>

        <ul class="sub-menu collapse" id="products">
            <li class="active"><a href="#">Novetats</a></li>
            <li><a href="#">Accio</a></li>
            <li><a href="#">Aventura</a></li>
            <li><a href="#">Cotxes</a></li>
            <li><a href="#">Terror</a></li>
        </ul>

        <!-- Submenu Perfil -->

        <li data-toggle="collapse" data-target="#usuari" data-parent="menu-content" class="collapsed">
          <a href="#"><i class="fa fa-user fa-lg"></i> Perfil <span class="arrow"></span></a>
        </li>

        <ul class="sub-menu collapse" id="usuari">
            <li class="active"><a href="#">Editar perfil</a></li>
            <li><a href="#">Canviar foto</a></li>
        </ul>

        <!--  Submenu Configuracio -->

        <li data-toggle="collapse" data-target="#config" data-parent="menu-content" class="collapsed">
          <a href="#"><i class="fa fa-cogs fa-lg"></i> Configuracio <span class="arrow"></span></a>
        </li>

        <ul class="sub-menu collapse" id="config">
            <li class="active"><a href="#">Comprar shit</a></li>
            <li><a href="#">Tencar sessió</a></li>
        </ul>

      </ul>
      

    </div>

</div>

<div id="contingut">
  @yield("contingut")
</div>

  <!-- Bootstrap core JavaScript-->
  <!-- <script src="{{asset('js/jquery-3.4.0.min.js')}}"></script> NO FUNCIONA -->
  <!-- <script src="{{asset('js/bootstrap.js')}}"></script> NO FUNCIONA -->

  <!-- JavaScript del Bootstrap + JQuery -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
    
  var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!'
    },
    created(){
      
      axios.get('/login')
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);})
    }
  })
    </script>
</body>
</html>