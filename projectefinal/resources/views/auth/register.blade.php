@extends('layouts.app')
<style>
body{
        background-color: #1A1A1A!important;
    }

    .card-header{
        background-color: #2e353d!important;
        color: white;
    }
    .card-body{
        background-color: #2e353d!important;
        color: white;
    }
    input[type='email'], input[type='email']:focus {
    background-color: #2e353d; 
    border: 0; 
    border-bottom: 1px solid #d19b3d;
    color: white;
    }

    input[type='text'], input[type='text']:focus {
    background-color: #2e353d; 
    border: 0; 
    border-bottom: 1px solid #d19b3d;
    color: white;
    }

    input[type='password'], input[type='password']:focus {
    background-color: #2e353d; 
    border: 0; 
    border-bottom: 1px solid #d19b3d;
    color:white;
    }
    </style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom" value="{{ old('nom') }}" required autofocus>

                                @if ($errors->has('nom'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cognom" class="col-md-4 col-form-label text-md-right">{{ __('Cognom') }}</label>

                            <div class="col-md-6">
                                <input id="cognom" type="text" class="form-control{{ $errors->has('cognom') ? ' is-invalid' : '' }}" name="cognom" value="{{ old('cognom') }}" required autofocus>

                                @if ($errors->has('cognom'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cognom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('Nickname') }}</label>

                            <div class="col-md-6">
                                <input id="nickname" type="text" class="form-control{{ $errors->has('nickname') ? ' is-invalid' : '' }}" name="nickname" value="{{ old('nickname') }}" required autofocus>

                                @if ($errors->has('nickname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nickname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-light">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
