@extends("layouts.plantilla")

<style>
</style>

@section("contingut")
<h1></h1>
<div class="container">
<div id="fancy-list-group">
    <div class="row">
    @if(count($user) == 0 && count($joc) == 0) 
    <h1 style="color:white;">Cap resultat que contingui {{$busqueda}}</h1> 
    @else
    <h1 style ="color:white;">Usuaris que contenen {{$busqueda}}...</h1>
    @foreach ($user as $usuari)
        

    <div class="list-group">

        <div class="col-lg-12">
            <li class="list-group-item list-group-item-success">
                <div class="list-group-item-addon">
                    <div style="background-image: url({{$usuari->fotoperfil}})"></div>
                </div>
                <div class="list-group-item-content">
                <a href="{{route('perfil.show',Crypt::encrypt($usuari->id))}}"><h4 class="list-group-item-heading">{{$usuari->nickname}}</h4></a>
                </div>
                <div class="list-group-item-controls">  
                <div class="btn-group">
                <i class="fas fa-user-plus"></i>
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
</div>

@endsection