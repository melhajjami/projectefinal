@extends('layouts.app')

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
                            <label for="usuari_nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="usuari_nom" type="text" class="form-control{{ $errors->has('usuari_nom') ? ' is-invalid' : '' }}" name="usuari_nom" value="{{ old('usuari_nom') }}" required autofocus>

                                @if ($errors->has('usuari_nom'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('usuari_nom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="usuari_cognom" class="col-md-4 col-form-label text-md-right">{{ __('Cognom') }}</label>

                            <div class="col-md-6">
                                <input id="usuari_cognom" type="text" class="form-control{{ $errors->has('usuari_cognom') ? ' is-invalid' : '' }}" name="usuari_cognom" value="{{ old('usuari_cognom') }}" required autofocus>

                                @if ($errors->has('usuari_cognom'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('usuari_cognom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="usuari_nickname" class="col-md-4 col-form-label text-md-right">{{ __('Nickname') }}</label>

                            <div class="col-md-6">
                                <input id="usuari_nickname" type="text" class="form-control{{ $errors->has('usuari_nickname') ? ' is-invalid' : '' }}" name="usuari_nickname" value="{{ old('usuari_nickname') }}" required autofocus>

                                @if ($errors->has('usuari_nickname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('usuari_nickname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="usuari_usuari_email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="usuari_email" type="usuari_email" class="form-control{{ $errors->has('usuari_email') ? ' is-invalid' : '' }}" name="usuari_email" value="{{ old('usuari_email') }}" required>

                                @if ($errors->has('usuari_email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('usuari_email') }}</strong>
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
                                <button type="submit" class="btn btn-primary">
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
