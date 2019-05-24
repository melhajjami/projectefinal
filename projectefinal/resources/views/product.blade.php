@extends("layouts.plantilla")

  <head>
    <title>{{$joc->nom}}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
  </head>

  <style>
/*****************globals*************/
body {
  font-family: 'open sans';
  overflow-x: hidden; }

img {
  max-width: 100%; }

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }
  @media screen and (max-width: 996px) {
    .preview {
      margin-bottom: 20px; } }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden; }
  .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.card {
  margin-top: 50px;
  background: #eee;
  padding: 3em;
  line-height: 1.5em; }

@media screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.product-title, .price, .sizes, .colors {
  text-transform: UPPERCASE;
  font-weight: bold; }

.checked, .price span {
  color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }

.size {
  margin-right: 10px; }
  .size:first-of-type {
    margin-left: 40px; }

.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 2em;
  border-radius: 2px; }
  .color:first-of-type {
    margin-left: 20px; }

.add-to-cart, .like {
  background: #ff9f1a;
  padding: 1.2em 1.5em;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .add-to-cart:hover, .like:hover {
    background: #b36800;
    color: #fff; }

.not-available {
  text-align: center;
  line-height: 2em; }
  .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }

.orange {
  background: #ff9f1a; }

.green {
  background: #85ad00; }

.blue {
  background: #0076ad; }

.tooltip-inner {
  padding: 1.3em; }

@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

#fotousuaris{
  width: 30px;
  height: 30px;
  max-width: 30px;
  max-height: 30px;
  display:inline-block;
  border-radius: 50%;
  background: no-repeat center;
  background-size: cover;
  margin-right: 3px;
}
.data{
  color:gray;
  display:inline;
  float:right;
}
.dades{
  display:inline;
}
.dades:link{
  text-decoration:none!important;
  color:black!important;
}
  </style>
  @section("contingut")
  @if(count($errors)>0)

    <ul>
        @foreach($errors->all() as $error)

            <div class="alert alert-danger col-sm-11">{{$error}}</div>

        @endforeach
    </ul>

@endif
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview ">
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="{{$joc->img}}" /></div>
						</div>
						
          </div>
          
					<div class="col-md-6">
						<h3 class="product-title">{{$joc->nom}}</h3>
						<h4 class="price">Descripció: </h4>
            <!-- <p class="product-description">{{$joc->descripcio}}</p> -->
            <p class="product-description">sdaewhfbWJFHwlefhbWEHFBwlefWEIFBlwehfbLWEFB
            </p>
						<h4 class="price">PREU: <span>{{$joc->preu}}€</span></h4>
						<div class="action">
							<button class="add-to-cart btn btn-default" type="button">add to cart</button>
							<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
						</div>
					</div>
				</div>
			</div>
    </div>

    <form method="post" action="{{route('comentaris.store', $joc->id)}}">
      @csrf 
    <div class="card">
      <h3>Pun fking tua!</h3>
      <select class="form-control" id="puntuacio">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
      <input class="btn btn-primary" type="submit" value="Publica">
    </div>
    </form>

    <div class="card">
    <h3>Comenta:</h3>
            
            <form method="post" action="{{route('comentaris.store', $joc->id)}}">
            @csrf 
              <textarea name="comentari" class="form-control"></textarea>
              <input type="hidden" name="joc_id" value="{{$joc->id}}">
              <input class="btn btn-primary" type="submit" value="Publica">
            </form>
      <div class="card-body">
    @forelse ($comentaris as $comentari)
              <a class="dades" href="{{route('perfil.show',Crypt::encrypt($comentari->user->id))}}"><div id="fotousuaris" style="background-image: url({{$comentari->user->fotoperfil}})">&nbsp</div></a><a class="dades" href="{{route('perfil.show',Crypt::encrypt($comentari->user->id))}}">{{$comentari->user->nickname}}</a>
              <p class="data">{{$comentari->created_at}}</p>
              <p>{{ $comentari->comentari }}</p>
              <hr>
            @empty
              <p>Encara no hi ha comentaris per aquest joc</p>
            @endforelse
    </div>
  </div>
    @endsection
  