@extends("layouts.plantilla")
<style>
    /* #contingut{
        color: white;
    } */
    .container {
        color: white;
    }

    #fila {
        border: 1px solid white;
        border-radius: 5px;
        height: 250px;
        border-width: 2px;
        border-color: #d19b3d;
        background-color: #1A1A1A;
        color: white;
        display: inline-block;
        margin: 1em;
        width: 100%;
    }

    #fotobiblioteca {
        float: left;
        margin: 10px;
    }

    .section-box h2 {
        margin-top: 0px;
    }

    .section-box h2 a {
        font-size: 15px;
    }

    .separator {
        padding-right: 5px;
        padding-left: 5px;
    }

    .rating-desc {
        position: absolute;
        bottom: 10px;
        right: 10px;
    }

    .container {
        padding-top: 5px;
    }

    img {
        margin-top: 10px;
    }

    a:link {
        text-decoration: none !important;
        color: white !important;
    }

    a {
        color: white !important;
    }

    #tenda {
        display: inline;
    }
    .amics{
        display: none;
    }
    .amicslink:hover + .amics{
        display:inline;
    }
    .amicslink{
        display:inline;
    }
</style>
@section("contingut")
<div class="container">
    <div class="container" id="app">
        <h1>Biblioteca</h1>
        <div class="row">

            @forelse($biblioteca as $joc)
            @php $count=0; @endphp

            <div class="col-md-6">
                <div class="well well-sm">
                    <div id="fila">
                        <div class="col-xs-3 col-md-3 text-center">
                            <a href="{{route('jocs.show',Crypt::encrypt($joc->id))}}"><img src="{{$joc->img}}" alt="yy" class="img-rounded img-responsive" id="fotobiblioteca" width="114" height="114" /></a>
                        </div>
                        <div>
                            <a href="{{route('jocs.show',Crypt::encrypt($joc->id))}}">
                                <h2>{{$joc->nom}}</h2>
                            </a>
                            <p>{{$joc->descripcio}}</p>
                            <div class="col-md-12">
                                <button class="btn btn-dark" v-on:click="obrirjoc({{$joc->id}})">Jugar</button>
                            </div>
                            @foreach($bibliotecaamics as $bib)
            @if($count == 0 && $bib->biblioteca->id_joc == $joc->id)
            <a class="amicslink" href="{{route('perfil.show',Crypt::encrypt($bib->id))}}"><div id="fotousuaris" style="background-image: url({{$bib->fotoperfil}})">&nbsp</div></a><p class="amics">{{$bib->nickname}}</p>
            @endif
            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <h1>Encara no tens cap joc, compra el primer <a id="tenda" href="{{route('jocs.index')}}">aqui!</a></h1>
            @endforelse
        </div>
    </div>
</div>
@endsection