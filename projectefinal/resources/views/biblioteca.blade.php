@extends("layouts.plantilla")
<style>
    /* #contingut{
        color: white;
    } */
    #fila{
        border: 1px solid white;
        border-radius: 5px;
        height: 250px;
        border-width: 2px;
        border-color: #d19b3d;
        background-color: #1A1A1A;
        color: white;
    }
    .section-box h2 {
        margin-top:0px;
    }
    .section-box h2 a { 
        font-size:15px; 
    }
    .separator { 
        padding-right:5px;
        padding-left:5px; 
    }
    .rating-desc{
        position: absolute;
        bottom: 10px;
        right: 10px;
    }
    .container{
        padding-top: 5px;
    }
    img{
        margin-top: 10px;
    }
</style>
@section("contingut")
<div class="container">
    <div class="container" id="app">
    <div class="row">
    @foreach($biblioteca as $joc)
        <div class="col-md-6">
            <div class="well well-sm">
                <div class="row" id="fila">
                    
                    <div class="col-xs-3 col-md-3 text-center">
                        <img src="{{$joc->img}}" alt="yy" class="img-rounded img-responsive" width="114" height="114" />
                    </div>
                    <div class="col-xs-9 col-md-9 section-box">
                        <h2>{{$joc->nom}} <a href="#"></a></h2>
                        <p>{{$joc->descripcio}}Call of Duty es una serie de videojuegos de disparos en primera persona, de estilo bélico, creada por Ben Chichoski</p>
                        
                        <div class="row rating-desc">
                        <hr id="holaaa" />
                            <div class="col-md-12">
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="separator">|</span>
                                <button class="btn btn-dark" v-on:click="obrirjoc({{$joc->id}})">Juga Nigger</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    </div>
</div>
@endsection