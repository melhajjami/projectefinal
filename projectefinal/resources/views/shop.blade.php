@extends("layouts.plantilla")
@push('styles')
    <link href="{{ asset('css/tenda.css') }}" rel="stylesheet">
@endpush

@section("contingut")
<div class="container">
<h1>Botiga</h1>
<hr>

<div class="row no-gutters">


@foreach($jocs as $joc)


<div class="col-12 col-sm-6 col-md-8 position-relative" >
	<figure class="card card-product" id="fila">
		<div class="img-wrap"><a href="{{route('jocs.show',Crypt::encrypt($joc->id))}}"><img src="{{ asset($joc->img) }}"></a></div>
		<figcaption class="info-wrap" style="border-top:none">
				<a class="title text-light" href="{{route('jocs.show',Crypt::encrypt($joc->id))}}">{{$joc->nom}}</a>
				<p class="desc">{{$joc->descripcio}}</p>
				<div class="rating-wrap">
					<div class="label-rating text-light">POSAR COMENTARIS </div>
					<div class="label-rating text-light">POSAR PUNTUACIO</div>
				</div> <!-- rating-wrap.// -->
		</figcaption>
		<div class="bottom-wrap" style="border-top:1px solid #d19b3d;">	
			<div class="price-wrap h5">
				<span class="price-new">{{ $joc->preu }}€</span>
			</div> <!-- price-wrap.// -->
		</div> <!-- bottom-wrap.// -->
	</figure>
</div> <!-- col // -->


@endforeach

<div class="col-auto text-light position-fixed" style="right:5%">

<div class="list-group" id="ranquing">
	<div class="card-header ranking">RANKING JOCS</div>
@foreach($ranking as $rank)
  	<a href="{{route('jocs.show',Crypt::encrypt($rank->id))}}" class="ranking2 list-group-item list-group-item-action">
		{{$loop->iteration}} &ensp;<img src="{{$rank->img}}" width="30px" height="30px" >&ensp;{{$rank->nom}}
		&ensp;&ensp;{{$rank->puntuacio}} <i class="fa fa-star"></i>
		@if($loop->iteration == 1)
		<i class="fa fa-trophy"></i>
		@elseif($loop->iteration == 2)
		<i class="fa fa-bookmark"></i>
		@elseif($loop->iteration == 3)
		<i class="fa fa-bookmark-o"></i>
		@endif
	</a>
@endforeach

</div>
</div>  

</div> <!-- row.// -->


</div> 

@endsection