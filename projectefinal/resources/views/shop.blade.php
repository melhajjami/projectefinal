@extends("layouts.plantilla")
@push('styles')
    <link href="{{ asset('css/tenda.css') }}" rel="stylesheet">
@endpush

@section("contingut")
<div class="container">
<h1>BOTIGA</h1>
<hr>

<div class="row">

@foreach($jocs as $joc)

<div class="col-md-4">
	<figure class="card card-product">
		<div class="img-wrap"><a href="{{route('jocs.show',Crypt::encrypt($joc->id))}}"><img src="{{ asset($joc->img) }}"></a></div>
		<figcaption class="info-wrap">
				<a class="title" href="{{route('jocs.show',Crypt::encrypt($joc->id))}}">{{$joc->nom}}</a>
				<p class="desc">{{$joc->descripcio}}</p>
				<div class="rating-wrap">
					<div class="label-rating">10 Comentaris</div>
					<div class="label-rating">Puntuacio: 4</div>
				</div> <!-- rating-wrap.// -->
		</figcaption>
		<div class="bottom-wrap">	
			<div class="price-wrap h5">
				<span class="price-new">{{ $joc->preu }}€</span>
			</div> <!-- price-wrap.// -->
		</div> <!-- bottom-wrap.// -->
	</figure>
</div> <!-- col // -->


@endforeach

</div> <!-- row.// -->


</div> 

@endsection