@extends('admin.layout.loginapp')
@section('content')
    <div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form class="login100-form validate-form" id="addagenciesform" action="{{ route('register') }}" method="post">{{ csrf_field() }}
					<span class="login100-form-logo">
						<i class="zmdi zmdi-flower"></i>
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Registration
					</span>
					<div class="row">
					<div class="col-lg-6 p-t-20">
					<div class="wrap-input100" >
						<input class="input100" type="text" name="fname" placeholder="Enter First Name">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					</div>
                                        <div class="col-lg-6 p-t-20">
					<div class="wrap-input100" data-validate = "lastname">
						<input class="input100" type="text" name="lname" placeholder="Enter Last Name">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					</div>
                                        <div class="col-lg-6 p-t-20">
					<div class="wrap-input100" data-validate = "mobile">
						<input class="input100" type="text" name="mobile" placeholder="Enter Mobile">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					</div>
					<div class="col-lg-6 p-t-20">
					<div class="wrap-input100" data-validate = "Enter email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					</div>
					<div class="col-lg-6 p-t-20">
					<div class="wrap-input100" data-validate="Enter password">
						<input class="input100" type="password" name="password" id="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					</div>
					<div class="col-lg-6 p-t-20">
					<div class="wrap-input100" data-validate="Enter password again">
						<input class="input100" type="password" name="confirmpassword" placeholder="Confirm password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					</div>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Sign UP
						</button>
					</div>
					<div class="text-center">
						<a class="txt1" href="{{ route('admin-login') }}">
							You already have a membership?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection



