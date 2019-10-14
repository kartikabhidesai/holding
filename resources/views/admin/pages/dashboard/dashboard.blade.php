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
                                    <span class="info-box-number">450</span>
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
@endsection