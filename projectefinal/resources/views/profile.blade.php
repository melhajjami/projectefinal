@extends("layouts.plantilla")

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  

<style>
#image1{
    background-image: url({{$user->fotoperfil}});
}
#banner{
    background-image:url({{$user->background}});
}
</style>
<body class="profile-page sidebar-collapse">
    @section("contingut")
  <div class="wrapper" >
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
          <div class="social-description">
            <h2>{{count($biblioteca)}}</h2>
            <p>{{$biblioteca}}</p>
          </div>
          <div class="social-description">
            <h2>{{count($amics)}}</h2>
            <p>Amics</p>
          </div>
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
                    <a id="boto" href="#button" class="btn btn-primary btn-round btn-lg"  v-on:click="enviarsolicitud({{$user->id}},{{session()->get('usuarilogin')->id}})">Enviar solucitud d'amistat</a>
                </div>
                @endif
        @endif
        <h3 class="title">Jocs</h3>
        @forelse($biblioteca as $hola)
        
        
        $jocs
      
    @empty
    <p>Aquest usuari enara no té cap joc </p>     
    @endforelse
  </div>
  
  <link href="{{asset('css/prova2.css')}}" rel="stylesheet" />
@endsection
</body>
