@extends("layouts.plantilla")

<style>
</style>

@section("contingut")
<h1></h1>
<div class="container">
<div id="fancy-list-group">
    <div class="row">
    @foreach ($user as $usuari)
    <div class="list-group">

        <div class="col-lg-12">
            <li class="list-group-item list-group-item-success">
                <div class="list-group-item-addon">
                    <div style="background-image: url({{$usuari->fotoperfil}})"></div>
                </div>
                <div class="list-group-item-content">
                <h4 class="list-group-item-heading">{{$usuari->nickname}}</h4>
                <p class="list-group-item-text">{{ $usuari->nom }}</p>
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

    @foreach ($joc as $yoc)
    
    <div class="list-group">

    <div class="col-lg-12">
        <li class="list-group-item list-group-item-success">
            <div class="list-group-item-addon">
                <div style="background-image: url({{$yoc->img}})"></div>
            </div>
            <div class="list-group-item-content">
            <h4 class="list-group-item-heading">{{$yoc->nom}}</h4>
            <p class="list-group-item-text">{{ $yoc->descripcio }}</p>
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

</div>
</div>

@endsection