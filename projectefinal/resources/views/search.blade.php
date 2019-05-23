@extends("layouts.plantilla")

<style>
#fancy-list-group .list-group li.list-group-item {
  margin-bottom: 10px;
  padding: 0;
  border: 0;
  position: relative;
  display: table;
  border-collapse: separate;
}
#fancy-list-group .list-group li.list-group-item .list-group-item-addon {
  display: table-cell;
  width: 1%;
  white-space: nowrap;
  vertical-align: middle;
  padding: 10px 20px;
  line-height: 1;
  text-align: center;
  border-right: 0;
  border-top-left-radius : 4px;
  border-bottom-left-radius: 4px;
  border: 1px solid #444;
  background-color: #444;
}
#fancy-list-group .list-group li.list-group-item.list-group-item-success .list-group-item-addon {
  border: 1px solid #3c763d;
  background-color: #3c763d;
}
#fancy-list-group .list-group li.list-group-item.list-group-item-info .list-group-item-addon {
  border: 1px solid #31708f;
  background-color: #31708f;
}
#fancy-list-group .list-group li.list-group-item.list-group-item-warning .list-group-item-addon {
  border: 1px solid #8a6d3b;
  background-color: #8a6d3b;
}
#fancy-list-group .list-group li.list-group-item.list-group-item-danger .list-group-item-addon {
  border: 1px solid #a94442;
  background-color: #a94442;
}
#fancy-list-group .list-group li.list-group-item .list-group-item-addon span {
  font-size: 40px;
  font-weight: normal;
  color: #fff;
}
#fancy-list-group .list-group li.list-group-item .list-group-item-content {
  display: table-cell;
  border-radius: 0;
  position: relative;
  z-index: 2;
  float: left;
  width: 100%;
  margin-bottom: 0;
  border: 1px solid #444;
  border-right: 0;
  padding: 10px;
}
#fancy-list-group .list-group li.list-group-item.list-group-item-success .list-group-item-content {
  border-color: #3c763d;
}
#fancy-list-group .list-group li.list-group-item.list-group-item-info .list-group-item-content {
  border-color: #31708f;
}
#fancy-list-group .list-group li.list-group-item.list-group-item-warning .list-group-item-content {
  border-color: #8a6d3b;
}
#fancy-list-group .list-group li.list-group-item.list-group-item-danger .list-group-item-content {
  border-color: #a94442;
}
#fancy-list-group .list-group li.list-group-item .list-group-item-controls {
  display: table-cell;
  width: 1%;
  white-space: nowrap;
  vertical-align: middle;
  padding: 0 10px;
  line-height: 1;
  text-align: center;
  border-left: 0;
  background-color: #444;
  border: 1px solid #444;
  border-top-right-radius : 4px;
  border-bottom-right-radius: 4px;
}
#fancy-list-group .list-group li.list-group-item .list-group-item-controls .label {
  display: block;
  text-align: center;
  margin-bottom: 10px;
  background-color: #fff;
  color: #444;
  text-transform: uppercase;
  font-weight: normal;
}
#fancy-list-group .list-group li.list-group-item.list-group-item-success .list-group-item-controls .label {
  background-color: #3c763d;
  color: #fff;
}
#fancy-list-group .list-group li.list-group-item.list-group-item-info .list-group-item-controls .label {
  background-color: #31708f;
  color: #fff;
}
#fancy-list-group .list-group li.list-group-item.list-group-item-warning .list-group-item-controls .label {
  background-color: #8a6d3b;
  color: #fff;
}
#fancy-list-group .list-group li.list-group-item.list-group-item-danger .list-group-item-controls .label {
  background-color: #a94442;
  color: #fff;
}
#fancy-list-group .list-group li.list-group-item .list-group-item-controls a {
  color : #fff;
  font-size: 20px;
  margin: 0 3px;
}
</style>

@section("contingut")
<h1></h1>
<div class="container">
@if(isset($details) || isset($joc))
<div id="fancy-list-group">
    <div class="row">
    @foreach($details as $user)
    @foreach($joc as $game)
    <div class="list-group">

        <div class="col-lg-12">
            <li class="list-group-item list-group-item-success">
                <div class="list-group-item-addon">
                    <div style="background-image: url({{$user->fotoperfil}})"></div>
                </div>
                <div class="list-group-item-content">
                <h4 class="list-group-item-heading">{{$user->nickname}}</h4>
                <p class="list-group-item-text">{{ $game->nom }}</p>
                </div>
                <div class="list-group-item-controls">
                <span class="label">Controls</span>
                <div class="btn-group">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add"><span class="glyphicon glyphicon-plus"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="View"><span class="glyphicon glyphicon-eye-open"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Settings"><span class="glyphicon glyphicon-cog"></span></a>
                </div>
                </div>
            </li>
        </div>
        
    </div>
    @endforeach
    @endforeach
</div>
@endif
</div>

@endsection