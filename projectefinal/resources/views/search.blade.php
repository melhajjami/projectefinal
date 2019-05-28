@extends("layouts.plantilla")

<style>
</style>

@section("contingut")
<h1></h1>
<div class="container">
<div id="fancy-list-group">
    @if(count($user) == 0 && count($joc) == 0)
    <div class="jumbotron">
        <h1>Ho sentim...</h1>      
        <p>No hi ha cap joc ni usuari que contingui {{$busqueda}}.</p>
    </div>
    @else
    <h1 style ="color:white;">Usuaris que contenen {{$busqueda}}...</h1>
    @foreach ($user as $usuari)
    <div class="list-group">

        <a href=""></a>
        
        <div class="col-lg-12">
            <li class="list-group-item list-group-item-success">
            <img src="{{$usuari->fotoperfil}}" width="50px" height="50px">
                <div class="list-group-item-content">
                <a href="{{route('perfil.show',Crypt::encrypt($usuari->id))}}"><h4 class="list-group-item-heading">{{$usuari->nickname}}</h4></a>
                </div>
                <div class="list-group-item-controls">  
                <div class="btn-group">
                <i class="fa fa-user-plus"></i>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="View"><span class="glyphicon glyphicon-eye-open"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Settings"><span class="glyphicon glyphicon-cog"></span></a>
                </div>
                </div>
            </li>
        </div>
        
    </div>
    @endforeach
    <h1 style ="color:white;">Jocs que contenen {{$busqueda}}...</h1>

    @foreach ($joc as $joc)
    <div class="list-group">

    <div class="col-lg-12">
        <li class="list-group-item list-group-item-success">
            <div class="list-group-item-addon">
                <div style="background-image: url({{$joc->img}})"></div>
            </div>
            <div class="list-group-item-content">
            <h4 class="list-group-item-heading">{{$joc->nom}}</h4>
            <p class="list-group-item-text">{{ $joc->descripcio }}</p>
            </div>
            <div class="list-group-item-controls">
            <span class="label">Controls</span>
            <div class="btn-group">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Add"><span class="fa fa-user-plus"></span></a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="View"><span class="glyphicon glyphicon-eye-open"></span></a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Settings"><span class="glyphicon glyphicon-cog"></span></a>
            </div>
            </div>
        </li>
    </div>

    </div>
    @endforeach
    @endif
</div>

@endsection