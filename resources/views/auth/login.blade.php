@extends('layouts.app')


@section('styles')
    <link rel="stylesheet" media="screen, print" href=" {{ secure_asset('css/page-login.css') }}">
@show



@section('content')
<body>
    <div class="blankpage-form-field">
        <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
            <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                <img src="{{ secure_asset('img/logo.png') }}" alt="SysWareHouse" aria-roledescription="logo">
                <span class="page-logo-text mr-1">{{ __('Login') }}</span>                
            </a>
        </div>
        <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
            <form method="POST" action="{{ route('login') }}">
                @csrf    
            
                <div class="form-group">
                    <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="help-block">
                        Your unique username to app
                    </span>
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group text-left">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="custom-control-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>                      
                    </div>
                </div>
                <button type="submit" class="btn btn-default float-right"> {{ __('Login') }} </button>
            </form>
        </div>
        <div class="blankpage-footer text-center">
            @if (Route::has('password.request'))
                 <a href="{{ route('password.request') }}"><strong>{{ __('Forgot Your Password?') }}</strong></a> 
            @endif
            | <a href="{{ route('register') }}"><strong>Register Account</strong></a>
        </div>
    </div>
    
    
   
   
    <!-- Page related scripts -->
    
     <!-- Scripts -->
    @include('layouts.scripts')


    @section('scripts')
    @show
</body>

@endsection
