@extends('layouts.full-screen')

@section('content')
<div class="loginBox">
    <h2>Hey There!</h2>
    <p>Welcome to KingdomCare. Login with social media or your email address.</p>
    <div class="loginOptions">
        <div class="socialLogin">
            <a href="" class="fb-log">
                LOGIN WITH FACEBOOK
            </a>
            <a href="" class="tw-log">
                LOGIN WITH TWITTER
            </a>
            <a href="" class="google-log">
                LOGIN WITH GOOGLE
            </a>
        </div><!--sociallogin-->

        <form method="POST" action="{{ route('login') }}" class="loginType indexlogin">
            @csrf
            <p>Or Login with an Email Address</p>
            <input class="text-field @error('email') is-invalid @enderror" type="email" name="email" placeholder="email address" onfocus="this.placeholder=''" onblur="this.placeholder='email address'" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input class="text-field @error('password') is-invalid @enderror" type="password" name="password" placeholder="password" onfocus="this.placeholder=''" onblur="this.placeholder='password'"  required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label class="checkbox-field" for="remember">Keep me logged in
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <span class="checkmark"></span>
            </label><br>

            <input class="login-btn btn" type="submit" name="submit" value="LOGIN">
            <a href="{{ route('password.request') }}"> I Forgot my Password </a>
        </form>


    </div><!--loginoptions-->
    @if (Route::has('register'))
        <p class="newaccount"> New User? <a href="{{ route('register') }}"> Register for a Free Account Now! </a></p>
    @endif


</div><!--loginBox-->
@endsection
