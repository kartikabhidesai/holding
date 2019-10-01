@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Add New Vender</header>

            </div>
            <div class="card-body " id="bar-parent">
                <form method="post" id='addvenderform' enctype="multipart/form-data">{{ csrf_field() }}
                    <div class="form-group">
                        <label for="profile">Profile Image</label>
                        <input type="file" class="form-control" id="profile" name="profile">
                    </div>
                    <div class="form-group ">
                        <label for="fname">Enter Your First Name</label>
                        <input type="text" class="form-control " id="fname" name="fname" placeholder="Enter Your First Name">
                    </div>
                    <div class="form-group ">
                        <label for="lname">Enter Your Last Name</label>
                        <input type="text" class="form-control " id="lname" name="lname" placeholder="Enter Your Last Name">
                    </div>
                    <div class="form-group ">
                        <label for="mobile">Enter Your Mobile Number</label>
                        <input type="text" class="form-control " id="mobile" name="mobile" placeholder="Enter Your Mobile Number">
                    </div>
                    <div class="form-group ">
                        <label for="email">Enter Your Email</label>
                        <input type="email" class="form-control " id="email" name="email" placeholder="Enter Your Email">
                    </div>
                    <div class="form-group ">
                        <label for="simpleFormEmail">Enter Your Password</label>
                        <input type="password" class="form-control " id="password" name="password" placeholder="Enter Your Password">
                    </div>
                    <div class="form-group ">
                        <label for="confirmpassword">Re-Enter Your Password</label>
                        <input type="password" class="form-control " id="confirmpassword" name="confirmpassword" placeholder="Re-Enter Your Password">
                    </div>
                    <div class="form-group">
                        <label for="state">Select Your State</label>
                        <select class="form-control  state" name="state"  id="state">
                            <option value="">Select State</option>
                             @foreach($result as $key)
                            <option value="{{$key->id}}">{{ $key->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="city">Select Your City</label>
                        <select class="form-control city" name="city"  id="city">
                            <option value="">Select City</option>
                        </select>
                    </div>
                    
                    <div class="form-group ">
                        <label for="address">Enter Your Address</label>
                        <input type="text" class="form-control " id="address" name="address" placeholder="Enter Your Address">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection