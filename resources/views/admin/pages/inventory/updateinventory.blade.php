@extends('admin.layout.app')
@section('content')
@foreach($result as $result)
@endforeach
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <form method="post" id='addform' enctype="multipart/form-data">{{ csrf_field() }}
                <div class="card-head">
                    <header>Update Inventory</header>
                </div>
                <div class="card-body row">
                    <div class="col-lg-6 p-t-20"> 
                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class = "mdl-textfield__input" type = "text" id = "txtFirstName" name="firstname" value="{{ $result->firstname }}">
                            <label class = "mdl-textfield__label">First Name</label>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20"> 
                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class = "mdl-textfield__input" type = "text" id = "txtLasttName" name="lastname" value="{{ $result->lastname }}">
                            <label class = "mdl-textfield__label" >Last Name</label>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20"> 
                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class = "mdl-textfield__input" type = "email" id = "txtemail" name="email" value="{{ $result->email }}">
                            <label class = "mdl-textfield__label" >Email</label>
                            <span class = "mdl-textfield__error">Enter Valid Email Address!</span>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20">
                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class = "mdl-textfield__input" type = "text" 
                                   pattern = "-?[0-9]*(\.[0-9]+)?" id = "text5" name="mobile" value="{{ $result->mobile }}">
                            <label class = "mdl-textfield__label" for = "text5">Mobile Number</label>
                            <span class = "mdl-textfield__error">Number required!</span>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20"> 
                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class = "mdl-textfield__input" type = "text" id = "txtCity" name="city" value="{{ $result->city }}">
                            <label class = "mdl-textfield__label" >City</label>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20"> 
                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class = "mdl-textfield__input" type = "text"  name="address" value="{{ $result->address }}">
                            <label class = "mdl-textfield__label" >Address</label>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20"> 
                        <div class="row">
                            <div class="col-lg-4">
                                <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <img height="100px" width="100px" src="{{ url('/uploads/inventory/'.$result->holding_img) }}" alt="User's Profile Picture">
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20"> 
                                <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <span class="input-group-addon btn btn-default btn-file">
                                        <input type="file" name="holding_img"/>
                                        <span class="fileinput-new">Select file</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-12 p-t-20 text-center"> 
                        <button type="submit" value="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
                        <button type="reset" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> 
@endsection