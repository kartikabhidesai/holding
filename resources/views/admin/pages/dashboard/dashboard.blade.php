@extends('admin.layout.app')
@section('content')
<!-- start page content -->
<!-- start widget -->
<div class="state-overview">
    <div class="row">


        <div class="col-xl-6 col-md-6 col-12">
            <a href="{{ route('inquiry') }}">
                <div class="info-box bg-blue">
                    <span class="info-box-icon push-bottom"><i class="material-icons">style</i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Inquiry</span>
                        <span class="info-box-number">{{ $noofopeninquirey }}</span>
                        <div class="progress">
                            <div class="progress-bar width-100"></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>



        <div class="col-xl-6 col-md-6 col-12">
            <a href="{{ route('booking') }}">
                <div class="info-box bg-orange">
                    <span class="info-box-icon push-bottom"><i class="material-icons">card_travel</i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">New Booking</span>
                        <span class="info-box-number">155</span>
                        <div class="progress">
                            <div class="progress-bar width-100"></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
<!-- end widget -->

<!-- end page content -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-yellow">
            <div class="card-head">
                <header>Hoarding List</header>
            </div>
            <div class="card-body ">
                <div class="row p-b-20">
                    <div class="col-md-12 col-sm-12 col-12">
                    </div>
                </div>
                <table id="dashboarddatatable" class="display full-width">
                    {{ csrf_field() }}
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Check</th>
                            <th>Images</th>
                            <th>Location</th>                            
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Budget</th>           
                            <th>Cart</th>           
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                <div class="pull-right" >
                    <button class="btn btn-primary share"><i class="fa fa-whatsapp" aria-hidden="true"></i> Share</button>
                    <button class="btn btn-info share"><i class="fa fa-envelope" aria-hidden="true"></i> Share</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection