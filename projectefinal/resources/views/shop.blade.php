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
				<p class="desc">{{str_limit($joc->descripcio,100)}}</p>
				<div class="rating-wrap">
					<div class="label-rating text-light"><p>Comentaris: {{$joc->comentari_count}} |</p></div>
					<div class="label-rating text-light"><p>Puntuacio: 
					@switch($joc->puntuacio)
                @case(0)
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                @break
                @case(1)
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                @break
                @case(2)
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                @break
                @case(3)
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                @break
                @case(4)
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                @break
                @case(5)
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                @break
              @endswitch
					</p></div>
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

<div class="col-md-3 text-light position-fixed" id="jdr" style="right:0.5%">

<div class="list-group" id="ranquing">
	<div class="card-header ranking">RANKING JOCS</div>
@foreach($ranking as $rank)
  	<a href="{{route('jocs.show',Crypt::encrypt($rank->id))}}" class="ranking2 list-group-item list-group-item-action">
    <div class="row d-flex justify-content-between">
      <div class="row col-md-8 d-flex justify-content-start">
      <p>{{$loop->iteration}}&emsp;</p>
      <img src="{{$rank->img}}" width="30px" height="30px">
      &emsp;
      <p>{{$rank->nom}}</p>
      
      </div>

      <div class="row col-md-4 d-flex justify-content-end">
      <p>{{$rank->puntuacio}} <i class="fa fa-star"></i>
      @if($loop->iteration == 1)
      <i class="fa fa-trophy"></i>
      @elseif($loop->iteration == 2)
      <i class="fa fa-bookmark"></i>
      @elseif($loop->iteration == 3)
      <i class="fa fa-bookmark-o"></i>
      </p>
      @endif
      </div>
    </div>
		
	</a>
@endforeach

</div>
</div>  

</div> <!-- row.// -->


</div> 

@endsection