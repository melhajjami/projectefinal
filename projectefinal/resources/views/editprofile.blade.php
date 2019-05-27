@extends("layouts.plantilla")
@push('styles')
    <link href="{{ asset('css/perfiledit.css') }}" rel="stylesheet">
@endpush

@section("contingut")

@if(count($errors)>0)

    <ul>
        @foreach($errors->all() as $error)

            <div class="alert alert-danger col-sm-11">{{$error}}</div>

        @endforeach
    </ul>

@endif

<form method="post" action="{{route('users.update', $user->id)}}">

    {{ csrf_field() }}
    {{ method_field('patch') }}

<div class="container" style="color: white">

    <div class="form-group">
        <label class="col-sm-2 control-label">Nom</label>
        <div class="col-sm-11">
            <input type="text" name="name" class="form-control" value="{{ $user->nom }}">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Cognom</label>
        <div class="col-sm-11">
            <input type="text" name="surname" class="form-control" value="{{ $user->cognom }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="nickname">Nickname</label>
        <div class="input-group col-sm-11">
            <div class="input-group-prepend">
                <div class="input-group-text">@</div>
            </div>
            <input type="text" name="nickname" class="form-control" id="nickname" placeholder="Nickname" value="{{ $user->nickname }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">URL avatar</label>
        <div class="col-sm-11">
            <input type="text" name="avatar" class="form-control" placeholder="http://exemple.com/foto.png" value="{{ $user->fotoperfil }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">URL fons perfil</label>
        <div class="col-sm-11">
            <input type="text" name="background" class="form-control" placeholder="http://exemple.com/foto.png" value="{{ $user->background }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Contrasenya atual</label>
        <div class="col-sm-11">
            <input type="password" name="oldpassword" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Nova contrasenya</label>
        <div class="col-sm-11">
            <input type="password" name="newpassword" class="form-control" name="password" id="password2" onkeyup="checkPass();">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Confirmar contrasenya</label>
        <div class="col-sm-11">
            <input type="password" name="confirmpassword" class="form-control" name="confirm" id="confirm2" onkeyup="checkPass();">
            <span id="confirm-message2" class="confirm-message"></span>
        </div>
    </div>
    
    <div class="form-group col-sm">

        <div class="row">
            <div class="col">
                <p>Privat</p>
            </div>

            <div class="col">
                <label class="switch control-label">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>

    </div>
    
    <div class="form-group">
        <div class="col-sm-11 col-sm-offset-2">
            <button type="submit" class="btn btn-primary" id="botosubmit">Submit</button>
            <button type="reset" class="btn btn-default">Cancel</button>
        </div>
    </div>

</div>

</form>

<script>
    
function checkPass()
{
    var password = document.getElementById('password2');
    var confirm  = document.getElementById('confirm2');

    var message = document.getElementById('confirm-message2');

    //Set the colors we will be using ...
    var good_color = "#70E46E";
    var bad_color  = "#E4836E";

    //Compare the values in the password field 
    //and the confirmation field
    if(password.value == confirm.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        confirm.style.backgroundColor = good_color;
        message.style.color           = good_color;
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        confirm.style.backgroundColor = bad_color;
        message.style.color           = bad_color;
    }
}  
</script>
@endsection