@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card login-card">
      <div class="row">
        <div class="col-md-5">
         
          <img src="\images\ChicaLogin.jpg" alt="login" class="login-card-img">
        </div>
        <div class="col-md-7">
          <div class="card-body">
            <div class="brand-wrapper">
              <!--
                  <img src="#" alt="logo" class="logo">
              -->
            </div>
            <p class="login-card-description">Inicia Sesión con tu cuenta</p>
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <label for="name">{{ __('Name') }}</label>
              <div class="form-group">
                <i class="fa fa-user icon"></i>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
              <label for="email">{{ __('E-Mail Address') }}</label>
              <div class="form-group">

                  
                      <i class="fa fa-envelope icon"></i>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  >

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                 
              </div>

              <label for="password" class="col-form-label">{{ __('Password') }}</label>
              <div class="form-group">

                  <div class="form-group">
                      <i class="fa fa-lock icon"></i>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
              <div class="form-group">
                <i class="fa fa-lock icon"></i>
                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-block login-btn mb-4" id="login">
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
