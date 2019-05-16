@extends("layouts.plantilla")

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  

<style>
#image1{
    background-image: url({{$user->fotoperfil}});
}

</style>
<body class="profile-page sidebar-collapse">
    @section("contingut")
  <div class="wrapper" >
    <div class="page-header">
    <div id="overlay" class="page-header-image">
      </div>
      <div id="banner" class="page-header-image" data-parallax="true" style="background-image:url('{{$user->background}})');">
      </div>
      <div class="container">
        <div id="image1" class="cropcircle photo-container"></div>
        <h3 class="title">{{$user->nickname}}</h3>
        <p class="category">{{$user->nom}} {{$user->cognom}}</p>
        <div class="content">
          <div class="social-description">
            <h2>26</h2>
            <p>Jocs</p>
          </div>
          <div class="social-description">
            <h2>26</h2>
            <p>Amics</p>
          </div>
          <div class="social-description" id="app">
            <h2>48</h2>
            <p> @{{message}}</p>
          </div>
        </div>
      </div>
    </div>
    <div id="botozindex" class="section">
      <div class="container">
          @if($user->id != session()->get('usuarilogin')->id)
            <div class="button-container">
                @if($friendship != null)
                    @if($friendship->actiu == 0)
                        @if($friendship->user1_id == session()->get('usuarilogin')->id)
                        <a id="boto" href="#button" class="btn btn-primary btn-round btn-lg disabled" disabled>Solicitud enviada</a>
                        @else
                        <a id="boto" href="#button" class="btn btn-primary btn-round btn-lg" v-on:click="acceptarsolicitud({{$user->id}},{{session()->get('usuarilogin')->id}})">Acceptar</a>
                        <a id="boto" href="#button" class="btn btn-primary btn-round btn-lg" v-on:click="declinarsolicitud({{$user->id}},{{session()->get('usuarilogin')->id}})">Cancelar</a>
                        @endif
                    @elseif($friendship->actiu == 1)
                        <a id="boto" href="#button" class="btn btn-primary btn-round btn-lg">Deixar de ser amics</a>
                    @endif
                @elseif($friendship == null)
                    <a id="boto" href="#button" class="btn btn-primary btn-round btn-lg"  v-on:click="enviarsolicitud({{$user->id}},{{session()->get('usuarilogin')->id}})">Enviar solucitud d'amistat</a>
                </div>
                @endif
        @endif
        <h3 class="title">About me</h3>
        <h5 class="description">An artist of considerable range, Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.</h5>
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <h4 class="title text-center">My Portfolio</h4>
            <div class="nav-align-center">
              <ul class="nav nav-pills nav-pills-primary nav-pills-just-icons" role="tablist">
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#profile" role="tablist">
                    <i class="now-ui-icons design_image"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#home" role="tablist">
                    <i class="now-ui-icons location_world"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#messages" role="tablist">
                    <i class="now-ui-icons sport_user-run"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- Tab panes -->
          <div class="tab-content gallery">
            <div class="tab-pane active" id="home" role="tabpanel">
              <div class="col-md-10 ml-auto mr-auto">
                <div class="row collections">
                  <div class="col-md-6">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg1.jpg" alt="" class="img-raised">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg3.jpg" alt="" class="img-raised">
                  </div>
                  <div class="col-md-6">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg8.jpg" alt="" class="img-raised">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg7.jpg" alt="" class="img-raised">
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="profile" role="tabpanel">
              <div class="col-md-10 ml-auto mr-auto">
                <div class="row collections">
                  <div class="col-md-6">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg6.jpg" class="img-raised">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg11.jpg" alt="" class="img-raised">
                  </div>
                  <div class="col-md-6">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg7.jpg" alt="" class="img-raised">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg8.jpg" alt="" class="img-raised">
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="messages" role="tabpanel">
              <div class="col-md-10 ml-auto mr-auto">
                <div class="row collections">
                  <div class="col-md-6">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg3.jpg" alt="" class="img-raised">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg8.jpg" alt="" class="img-raised">
                  </div>
                  <div class="col-md-6">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg7.jpg" alt="" class="img-raised">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg6.jpg" class="img-raised">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  
  <link href="{{asset('css/prova2.css')}}" rel="stylesheet" />
@endsection
</body>
