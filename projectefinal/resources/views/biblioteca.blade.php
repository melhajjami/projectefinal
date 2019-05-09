@extends('layouts.plantilla')
@section('contingut')
<div class="container">
    <div class="row">
		<div class="well">
        <h1 class="text-center">Biblioteca</h1>
        <div class="list-group">
          @foreach($biblioteca as $joc)
          <div class="media col-md-9">
                    <figure class="pull-left">
                        <img style="width: 100px;height:100px;object-fit: cover;" class="media-object img-rounded img-responsive"  src="{{$joc->img}}" alt="placehold.it/350x250" >
                    </figure>
                    <h4 class="list-group-item-heading"> {{$joc->nom}} </h4>
                    <p class="list-group-item-text">{{$joc->descripcio}}</p> 
                
               
                    <h2>{{$joc->tempsjugat}} h</h2>
                </div>
                
            </div>
          @endforeach
        </div>
        </div>
	</div>
</div>
@endsection