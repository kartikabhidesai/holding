@extends('admin.layout.loginapp')
@section('content')
<div class="limiter">
    <div class="container-login100 page-background">
        <div class="wrap-login100">
            <form class="login100-form " method="post"  action="{{ route('admin-login') }}" id="loginform">{{ csrf_field() }}
                <span class="login100-form-logo">
                    <i class="zmdi zmdi-flower"></i>
                </span>
                <span class="login100-form-title p-b-34 p-t-27">
                    Log in
                </span>
                @if (session('session_error'))
                <div class=" alert-danger">
                    {{ session('session_error') }}
                </div>
                @endif
                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">Login</button>
                </div>
                <div class="text-center">
                    <a class="txt1" href="{{ route('forgotpassword') }}">
                        Forgot Password?
                    </a><br>
                    <a class="txt1" href="{{ route('register') }}">
                        Haven't Account? SIGN UP
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection



