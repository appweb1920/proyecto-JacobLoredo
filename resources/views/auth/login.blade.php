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
              <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <label for="email">{{ __('E-Mail Address') }}</label>
                <div class="form-group">

                    <div class="form-group">
                        <i class="fa fa-user icon"></i>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  >

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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
                <div class="form-group row">
                            <div class=" offset-md-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordar') }}
                                    </label>
                                </div>
                            </div>
                </div>
                  
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-3">
                        <button type="submit" class="btn btn-block login-btn mb-4"  name="login" id="login">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
                  
                </form>
                
                <p class="login-card-footer-text">Don't have an account? <a href="{{ route('register') }}" class="text-reset">Register here</a></p>
                
            </div>
          </div>
        </div>
      </div>
    </div>



@endsection
