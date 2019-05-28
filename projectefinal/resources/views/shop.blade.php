@extends("layouts.plantilla")
@push('styles')
    <link href="{{ asset('css/tenda.css') }}" rel="stylesheet">
@endpush

@section("contingut")
<div class="container">
<h1>BOTIGA</h1>
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
<div class="col-auto text-light position-fixed" style="right:10%"><div class="card card-product text-dark">RANKING MY FRUEND</div></div>
</div> <!-- row.// -->


</div> 

@endsection