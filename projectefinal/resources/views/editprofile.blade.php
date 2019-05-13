@extends("layouts.plantilla")

@section("contingut")

<form method="post" action="{{route('users.update', $user->id)}}">

    {{ csrf_field() }}
    {{ method_field('patch') }}

    <input type="text" name="name"  value="{{ $user->nom}}" />

    <input type="email" name="email"  value="{{ $user->email }}" />

    <input type="text" name="nickname" value="{{ $user->nickname }}"/>

    <input type="text" name="fotoperfil" value="{{ $user->fotoperfil }}"/>

    <input type="text" name="bg" value="{{ $user->background }}"/>

    <input type="text" name="saldo" value="{{ $user->saldo }}"/>

    <!-- <input type="password" name="password" />

    <input type="password" name="password_confirmation" /> -->

    <button type="submit">Send</button>
</form>

@endsection