@extends('admin.layout.app')
@foreach($result1 as $value1)
@endforeach
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Edit Vender</header>

            </div>
            <div class="card-body " id="bar-parent">
                <form method="post" id='editvenderform' enctype="multipart/form-data">{{ csrf_field() }}
                    <div class="form-group">
                        <label for="profile">Profile Image</label>
                        <input type="file" class="form-control" id="profile" name="profile">
                    </div>
                    <div class="form-group ">
                        <label for="fname">Enter Your First Name</label>
                        <input type="text" class="form-control " id="fname" name="fname" placeholder="Enter Your First Name" value="{{ $value1 -> firstname }}">
                    </div>
                    <div class="form-group ">
                        <label for="lname">Enter Your Last Name</label>
                        <input type="text" class="form-control " id="lname" name="lname" value="{{ $value1 -> lastname }}">
                    </div>
                    <div class="form-group ">
                        <label for="mobile">Enter Your Mobile Number</label>
                        <input type="text" class="form-control " id="mobile" name="mobile" value="{{ $value1 -> mobileno }}">
                    </div>
                    <div class="form-group ">
                        <label for="email">Enter Your Email</label>
                        <input type="email" class="form-control " id="email" name="email" value="{{ $value1 -> email }}">
                    </div>
                    <div class="form-group">
                        <label for="state">Select Your State</label>
                        <select class="form-control  state" name="state"  id="state">
                            <option value="">Select State</option>
                            @foreach($result as $key)
                            <option value="{{ $key->id }}" {{ $key->id == $value1->state ? 'selected': ''}}>{{ $key->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="city">Select Your City</label>
                        <select class="form-control city" name="city"  id="city">
                            @foreach($result2 as $key1)
                            <option value='{{ $key1->id }}'{{ $key1->id == $value1->city ? 'selected': ''}}>{{ $key1->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group ">
                        <label for="address">Enter Your Address</label>
                        <input type="text" class="form-control " id="address" name="address" value="{{ $value1 -> address }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection