@extends('layouts.plantilla')
<style>
    #contingut{
        color: white;
    }
    img{
        width: 200px;
        height: 200px;
        object-fit: cover;
    
    }
</style>
<!-- pending friendships == session()->get('pendingfriendships'); //  -->
@section('contingut')
<div class="container">
<h2>Biblioteca</h2>
@foreach($biblioteca as $joc)
          <div class="d-flex justify-content-around">
                    <div class="col">
                        <img class="media-object img-rounded img-responsive"  src="{{$joc->img}}" alt="placehold.it/350x250" >
                    </div>
                    <div class="col">
                        <h4 class="list-group-item-heading"> {{$joc->nom}} </h4>
                        <p class="list-group-item-text">{{$joc->descripcio}}</p> 
                    </div>
                    <p class="list-group-item-text">{{$joc->puntuacio}}</p> 
                    <div class="col">
                        <h2>{{$joc->tempsjugat}}h</h2>
                    </div>
                </div>
            
          @endforeach
          </div>
        </div>
@endsection