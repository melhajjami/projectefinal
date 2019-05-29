@extends("layouts.plantilla")

<head>
  <title>{{$joc->nom}}</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

  <link href="{{ asset('css/product.css') }}" rel="stylesheet">

</head>

@section("contingut")
@if(count($errors)>0)

<ul>
  @foreach($errors->all() as $error)

  <div class="alert alert-danger col-sm-11">{{$error}}</div>

  @endforeach
</ul>

@endif
<div id="snackbar">Disfruta del joc <a class="btn btn-primary" href="{{route('biblioteca.index')}}">Jugar</a></div>
<div class="container" id="app">
  <div class="card" style="background-color: #1A1A1A; border-bottom: 1px solid #d19b3d; border-left: 1px solid #d19b3d; color:white;">
    <div class="container-fliud">
      <div class="wrapper row">
        <div class="preview ">
          <div class="preview-pic tab-content">
            <div class="tab-pane active" id="pic-1"><img class="fotojoc" src="{{$joc->img}}" /></div>
          </div>

        </div>
        <div class="col-md-6">
          <h3 class="product-title">{{$joc->nom}}</h3>
          <h4 class="price">Descripció: </h4>
          <!-- <p class="product-description">{{$joc->descripcio}}</p> -->
          <p class="product-description">{{$joc->descripcio}}
          </p>
          <h4>PUNTUACIO:</h4>
          @switch($joc->puntuacio)
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
          <h4 class="price">PREU: <span>{{$joc->preu}}€</span></h4>
          <div id="posicioboto" class="action">
            @if($tejoc == null)
            <a id="{{$joc->id}}" class="add-to-cart btn btn-default" v-on:click="comprarJoc({{session()->get('usuarilogin')->id}},{{$joc->id}},{{$joc->preu}})">Comprar</a>
            @else
            <a id="{{$joc->id}}" class="add-to-cart btn btn-default" href="{{route('biblioteca.index')}}">Jugar</a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card" style="background-color: #1A1A1A; border-bottom: 1px solid #d19b3d; border-left: 1px solid #d19b3d; color:white;">
    @if($biblio!=null)
    @if($biblio->puntuacio != 0 || $biblio->puntuacio != null)
    <h3>Puntua: <h5>La teva puntuacio actual:</h5>{{$biblio->puntuacio}}</h3>
    @endif
    @endif
    <form method="post" action="{{route('comentaris.puntuar', $joc->id)}}">
      @csrf
      <label for="sel1">Nota:</label>
      <select class="form-control col-md-4" name="puntuacio">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option selected="selected">5</option>
      </select>
      <br>
      <input type="hidden" name="joc_id" value="{{$joc->id}}">
      
      @if($biblio!=null)
      <input class="btn btn-dark" type="submit" value="Actualitzar la puntuacio">
      @else
      <input class="btn btn-dark" type="submit" value="Puntuar aquest joc">
      @endif

    </form>
  </div>
  <div class="card" style="background-color: #1A1A1A; border-bottom: 1px solid #d19b3d; border-left: 1px solid #d19b3d; color:white;">
    <h3>Comenta:</h3>
    <form method="post" action="{{route('comentaris.store', $joc->id)}}">
      @csrf
      <textarea name="comentari" class="form-control" style="background-color: #2e353d; color: white;"></textarea>
      <input type="hidden" name="joc_id" value="{{$joc->id}}">

      <br><input class="btn btn-dark" type="submit" value="Publica">
    </form>
    <div class="card-body">
      @forelse ($comentaris->reverse() as $comentari)
      <a class="dades" href="{{route('perfil.show',Crypt::encrypt($comentari->user->id))}}">
        <div id="fotousuaris" style="background-image: url({{$comentari->user->fotoperfil}})">&nbsp</div>
      </a><a class="dades" href="{{route('perfil.show',Crypt::encrypt($comentari->user->id))}}">{{$comentari->user->nickname}}</a>
      <p class="data">{{$comentari->created_at}}</p>
      <p>{{ $comentari->comentari }}</p>
      <hr>
      @empty
      <p>Encara no hi ha comentaris per aquest joc</p>
      @endforelse
    </div>
  </div>
  @endsection