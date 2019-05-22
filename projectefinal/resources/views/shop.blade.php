@extends("layouts.plantilla")
<style>
.card-product .img-wrap {
    border-radius: 3px 3px 0 0;
    overflow: hidden;
    position: relative;
    height: 220px;
    text-align: center;
}
.card-product .img-wrap img {
    max-height: 100%;
    max-width: 100%;
    object-fit: cover;
}
.card-product .info-wrap {
    overflow: hidden;
    padding: 15px;
    border-top: 1px solid #eee;
}
.card-product .bottom-wrap {
    padding: 15px;
    border-top: 1px solid #eee;
}

.label-rating { margin-right:10px;
    color: #333;
    display: inline-block;
    vertical-align: middle;
}

.card-product .price-old {
    color: #999;
}
</style>

@section("contingut")
<div class="container">
<h1>TENDA</h1>
<hr>

<div class="row">

@foreach($jocs as $joc)

<div class="col-md-4">
	<figure class="card card-product">
		<div class="img-wrap"><img src="{{ asset($joc->img) }}"></div>
		<figcaption class="info-wrap">
				<h4 class="title">{{$joc->nom}}</h4>
				<p class="desc">{{$joc->descripcio}}</p>
				<div class="rating-wrap">
					<div class="label-rating">10 Comentaris</div>
					<div class="label-rating">Puntuacio: 4</div>
				</div> <!-- rating-wrap.// -->
		</figcaption>
		<div class="bottom-wrap">
			<a href="" class="btn btn-sm btn-primary float-right">Comprar</a>	
			<div class="price-wrap h5">
				<span class="price-new">{{ $joc->preu }}€</span> <del class="price-old">{{ $joc->preu }}€</del>
			</div> <!-- price-wrap.// -->
		</div> <!-- bottom-wrap.// -->
	</figure>
</div> <!-- col // -->


@endforeach

</div> <!-- row.// -->


</div> 

@endsection