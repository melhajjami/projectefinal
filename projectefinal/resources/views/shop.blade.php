@extends('layouts.plantilla')

<style>
* {
  box-sizing: border-box;
}

.cards {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  margin: 0;
  padding: 0;
  text-align: center;
}
@media (max-width: 550px) {
  .cards {
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
        -ms-flex-direction: column;
            flex-direction: column;
    }
}

.card {
  position: relative;
  width: 300px;
  margin: 1%;
  background: whiteSmoke;
}
@media (max-width: 815px) {
  .card {
    width: 300px;
  }
}
@media (max-width: 550px) {
  .card {
    width: 100%;
  }
}
.card__inner{
  position: relative;
  background-size: cover;
  overflow: hidden;
}
.card__inner h2 {
  color: white;
  margin: 0;
  padding: 30% 0;
  text-shadow: 1px 1px 3px #000;
  line-height: 18px;
  text-transform: uppercase;
}
.card__inner h2 small {
  font-style: italic;
  display: inherit;
}
.card__buttons {
  position: absolute;
  width: 100%;
  -webkit-transform: translateY(0);
          transform: translateY(0);
  -webkit-transition: -webkit-transform .5s ease;
  transition: -webkit-transform .5s ease;
  transition: transform .5s ease;
  transition: transform .5s ease, -webkit-transform .5s ease;
}
.card__buttons a {
  position: relative;
  float: left;
  width: 50%;
  padding: 10px;
  text-decoration: none;
  color: black;
  border-top: 1px solid #ccc;
  border-bottom: 1px solid #ccc;
}
.card__buttons a:first-child {
  background: #fff;
  border-right: 1px solid #ccc;
}
.card__buttons a:last-child {
  background: #ffde00;
}
.card__buttons a:hover {
  color: #ffde00;
  background: #000;
}
.card:hover .card__buttons {
  -webkit-transform: translateY(-38px);
          transform: translateY(-35px);
}
.card__tagline {
  font-size: 1rem;
  font-weight: 100;
}
.card__icons {
  margin: 0 0 50px;
  padding: 0;
  list-style: none;
}
.card__icons li {
  display: inline-block;
  padding: 0 10px 10px;
}
.card__icons .fa {
  font-size: .8rem;
}
.card__icons .fa:before {
  font-size: 1.2rem;
  display: block;
  padding-bottom: 5px;
}
.card p {
  position: absolute;
  bottom: 0;
  text-align: center;
  width: 100%;
}
</style>

@section('contingut')

<div class="container">
<ul class="cards">

  @foreach($jocs as $joc)

  <li class="card">
    
    <div class="card__inner" style="background-image: url({{$joc->img}})">
      <h2>{{$joc->nom}}</h2>
      <div class="card__buttons">
        <a href="{{route('jocs.show',Crypt::encrypt($joc->id))}}" data-tip="Veure"><i class="fa fa-search"></i></a>
        <a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
      </div>
    </div>

    <h3 class="card__tagline">{{$joc->descripcio}}</h3>
    <ul class="card__icons">
      <li><i class="fa fa-coffee">Coffee</i></li>
      <li><i class="fa fa-bolt">Bolt</i></li>
      <li><i class="fa fa-bomb">Bomb</i></li>
      <li><i class="fa fa-cutlery">Cutlery</i></li>
      <li><i class="fa fa-bolt">Bolt</i></li>
    </ul>
    <p>{{$joc->preu}}€</p>
  </li>

  @endforeach
  
</ul>
</div>

@endsection
