@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Add Inquirey </header>
                
            </div>
            <div class="card-body " id="bar-parent3">
                <form id='addinquirey' class="" method="POST">
                    {{ csrf_field() }}
                <div class="form-group ">
                    <label class="control-label" >Cilent First Name </label>
                    <input type="text" class="form-control" name="fname" placeholder="Enter cilent first name">
                </div>
                
                <div class="form-group ">
                    <label class="control-label" >Cilent Last Name </label>
                    <input type="text" class="form-control" name="lname" placeholder="Enter cilent last name">
                </div>
                
                 <div class="form-group ">
                    <label class="control-label" >Cilent Mobile Number</label>
                    <input type="text" class="form-control" name="mono" placeholder="Enter cilent mobile number">
                </div>
                
                <div class="form-group ">
                    <label class="control-label" >Cilent Landline Number </label>
                    <input type="text" class="form-control" name="landline" placeholder="Enter cilent landline number">
                </div>
                
                <div class="form-group ">
                    <label class="control-label" >Company Name</label>
                    <input type="text" class="form-control" name="companyname" placeholder="Enter company name">
                </div>
                    
                <div class="form-group ">
                    <label class="control-label" >Cilent's email address</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter cilent email address">
                </div>
                
                <div class="form-group ">
                    <label class="control-label" >Inquirey Time</label>
                    <select class="form-control" name="time">
                        @foreach($inquireytime as $key => $value){
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group ">
                    <label class="control-label" >Inquirey Date</label>
                    
                    <input type="text" class="form-control" id="date" name="idate" placeholder="Enter inquirey date">
                </div>
                
                <div class="form-group ">
                    <label class="control-label" >Inquirey Sources</label>
                    <input type="text" class="form-control" name="isources" placeholder="Enter inquirey source">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Submit</button>
                    <button type="button" class="btn btn-default">Cancel</button>
                </div>
                    
                </form>
            </div>
        </div>
    </div>
  
</div>

@endsection