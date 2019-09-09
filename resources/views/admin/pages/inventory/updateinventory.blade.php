@extends('admin.layout.app')
@section('content')
        @foreach($result as $result)
        @endforeach
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <form method="post" id='addform'>@csrf 
                        <div class="card-head">
                        <header>Add Room Booking</header>
                        <button id = "panel-button" 
                                class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
                                data-upgraded = ",MaterialButton">
                            <i class = "material-icons">more_vert</i>
                        </button>
                        <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            data-mdl-for = "panel-button">
                            <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
                            <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
                            <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
                        </ul>
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
                        <div class="col-lg-12 p-t-20 text-center"> 
                            <button type="submit" value="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
                            <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div> 
@endsection