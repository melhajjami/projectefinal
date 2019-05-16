@extends('layouts.plantilla')
<style>
    #contingut{
        color: white;
    }
</style>
<!-- pending friendships == session()->get('pendingfriendships'); //  -->
@section('contingut')
<div class="container">
<h2>Biblioteca</h2>
@foreach($biblioteca as $joc)
          <div class="d-flex justify-content-around">
                    <div class="col">
                        <img src="{{$joc->img}}" width="200" height="250">
                    </div>
                    <div class="col">
                        <h4 class="list-group-item-heading"> {{$joc->nom}} </h4>
                        <p class="list-group-item-text">{{$joc->descripcio}}</p>
                        <button class="btn btn-dark" onclick="myFunction({{$joc->id}})">Jugar</button>
                    </div>
                    <p class="list-group-item-text">{{$joc->puntuacio}}</p> 
                    <div class="col">
                        <h2>{{$joc->tempsjugat}}h</h2>
                    </div>
                </div>
            
          @endforeach
          </div>
        </div>
@endsection

<script>
var contador = 0;

function myFunction(idjoc) {

    var child = window.open('file:///C:/Users/Bosc/Desktop/Jocsç/2048-master/index.html');
    // var child = window.open('http://google.com','','toolbar=0,status=0,width=626,height=436');
    var timer = setInterval(checkChild, 1000);
    
    function checkChild() {
        if (child.closed) {
            alert("Child window closed");   
            clearInterval(timer);
            document.getElementById("yo").innerHTML = secondsToTime(contador);;
        }
        else{
            contador = contador + 1;
        }
    }
}

function secondsToTime(secs)
{
    var hours = Math.floor(secs / (60 * 60));

    var divisor_for_minutes = secs % (60 * 60);
    var minutes = Math.floor(divisor_for_minutes / 60);

    var divisor_for_seconds = divisor_for_minutes % 60;
    var seconds = Math.ceil(divisor_for_seconds);

    var string = "h: " + hours + " m: " + minutes + " s: " + seconds;
    
    return string;
}
</script>