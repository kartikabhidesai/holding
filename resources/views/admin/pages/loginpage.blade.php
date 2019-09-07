@extends('admin.layout.loginapp')
@section('content')
 <div class="limiter">
        <div class="container-login100 page-background">
                <div class="wrap-login100">
                        <form class="login100-form validate-form" method="post">@csrf
                                <span class="login100-form-logo">
                                        <i class="zmdi zmdi-flower"></i>
                                </span>
                                <span class="login100-form-title p-b-34 p-t-27">
                                        Log in
                                </span>
                                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                                        <input class="input100" type="text" name="username" placeholder="Username">
                                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="Enter password">
                                        <input class="input100" type="password" name="pass" placeholder="Password">
                                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                                </div>
                                <div class="container-login100-form-btn">
                                        <a class="login100-form-btn" href="{{ route('dashboard') }}">
                                                Login
                                        </a>
                                </div>
                                <div class="text-center">
                                        <a class="txt1" href="{{ route('forgotpassword') }}">
                                                Forgot Password?
                                        </a><br>
                                        <a class="txt1" href="{{ route('register') }}">
                                               Havent't Account? SIGN UP
                                        </a>
                                </div>
                        </form>
                </div>
        </div>
</div>
@endsection



