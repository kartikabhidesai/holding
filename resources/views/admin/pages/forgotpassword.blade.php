@extends('admin.layout.loginapp')
@section('content')
    <div class="limiter">
        <div class="container-login100 page-background">
                <div class="wrap-login100">
                        <form class="login100-form validate-form">
                                <span class="login100-form-logo">
                                        <i class="zmdi zmdi-flower"></i>
                                </span>
                                <span class="login100-form-title p-b-34 p-t-27">
                                        Forgot Password
                                </span>
                                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                                        <input class="input100" type="text" name="Enter Email" placeholder="Enter Email">
                                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                                </div>
                                <div class="container-login100-form-btn">
                                        <button class="login100-form-btn">
                                                SEND
                                        </button>
                                </div>
                                <div class="text-center">
                                        <a class="txt1" href="{{ route('admin-login') }}">
                                                Back To Login?
                                        </a>
                                </div>
                        </form>
                </div>
        </div>
</div>
@endsection



