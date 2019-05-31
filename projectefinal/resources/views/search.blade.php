@extends("layouts.plantilla")

@push('styles')
<link href="{{ asset('css/search.css') }}" rel="stylesheet">
@endpush

@section("contingut")
<h1></h1>
<div class="container">
<div id="fancy-list-group">
    @if(count($user) == 0 && count($joc) == 0)
    <div class="jumbotron">
        <h1>Ho sentim...</h1>      
        <p class="text-dark">No hi ha cap joc ni usuari que contingui {{$busqueda}}.</p>
    </div>
    @else
    <h3 style ="color:white;">Usuaris que contenen {{$busqueda}}...</h3>
    <div class="row">
    @foreach ($user as $usuari)
    <div class="list-group">

        <div class="col-lg-12">
            <li class="list-group-item list-group-item" style="background-color: #2e353d; border-left: 1px solid #d19b3d;">
            <div id="fotousuariss" style="background-image: url({{$usuari->fotoperfil}})">&nbsp</div>    
            <div class="list-group-item-content">
                <a class="link" href="{{route('perfil.show',Crypt::encrypt($usuari->id))}}"><h4 class="list-group-item-heading">{{$usuari->nickname}}</h4></a>
                </div>
            </li>
        </div>
        
    </div>
    @endforeach
    </div>
    <br>
    <h3 style ="color:white;">Jocs que contenen {{$busqueda}}...</h3>

    <div class="row">
    @foreach ($joc as $joc)
    <div class="list-group">

        <div class="col-lg-12">
            <li class="list-group-item list-group-item" style="background-color: #2e353d; border-left: 1px solid #d19b3d;">
                <img src="{{$joc->img}}" width="50px" height="50px" style="border-radius: 5%;">
                
                <div class="list-group-item-content">
                <a class="link" href="{{route('jocs.show',Crypt::encrypt($joc->id))}}">{{$joc->nom}}</a>
                <p>{{str_limit($joc->descripcio, 20)}}</p>
                </div>
            </li>
        </div>
        
    </div>

    @endforeach
    </div>
    @endif
</div>

@endsection