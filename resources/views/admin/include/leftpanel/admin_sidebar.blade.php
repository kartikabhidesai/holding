@php
$currRoute = Route::current()->getName();
$items = Session::get('logindata');
@endphp

<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll">
            <ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="sidebar-user-panel">
                    <div class="user-panel">
                        <div class="row">
                            <div class="sidebar-userpic">
                                <img src="{{ url('public/admin/assets/img/dp.jpg') }}" class="img-responsive" alt=""> </div>
                        </div>
                        <div class="profile-usertitle">
                            <div class="sidebar-userpic-name">{{ "welcome" }}</div>
                            <div class="sidebar-userpic-name">{{ $items[0]['fname'] }}</div>
                            <div class="profile-usertitle-job"> Admin </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item start {{ ($currRoute == 'dashboard')  ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="nav-link nav-toggle">
                        <i class="fa fa-tachometer" ></i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                </li>
                
                <li class="nav-item start {{ ($currRoute == 'add-inquiry')  ? 'active' : '' }} {{ ($currRoute == 'close-inquiry')  ? 'active' : '' }}  {{ ($currRoute == 'inquiry')  ? 'active' : '' }}">
                    <a href="#" class="nav-link nav-toggle">
                         <i class="fa fa-question-circle" ></i>
                        <span class="title">Inquiry</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ ($currRoute == 'add-inquiry')  ? 'active' : '' }}">
                            <a href="{{ route('add-inquiry') }}" class="nav-link ">
                                <span class="title">Add Inquiry</span>
                            </a>
                        </li>
                        
                        <li class="nav-item {{ ($currRoute == 'inquiry')  ? 'active' : '' }}">
                            <a href="{{ route('inquiry') }}" class="nav-link ">
                                <span class="title">Open Inquiry</span>
                            </a>
                        </li>
                        
                        <li class="nav-item {{ ($currRoute == 'close-inquiry')  ? 'active' : '' }}">
                            <a href="{{ route('close-inquiry') }}" class="nav-link ">
                                <span class="title">Close Inquiry</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                                
                
                <li class="nav-item start {{ ($currRoute == 'booking' || $currRoute == 'add-hoarding' || $currRoute == 'edit-hoarding' )  ? 'active' : '' }}">
                    <a href="{{ route('booking') }}" class="nav-link nav-toggle">
                        <i class="fa fa-list" ></i>
                        <span class="title">Booking</span>
                        <span class="selected"></span>
                    </a>
                </li>
          
            </ul>
        </div>
    </div>
</div>