@php
$currRoute = Route::current()->getName();
$items = Session::get('logindata');
@endphp
@if($items[0]['user_type']=='ADMIN')
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
                                <img src="{{ url('admin/assets/img/dp.jpg') }}" class="img-responsive" alt=""> </div>
                        </div>
                        <div class="profile-usertitle">
                            <div class="sidebar-userpic-name">{{ "welcome" }}</div>
                            <div class="sidebar-userpic-name">{{ $items[0]['fname'] }}</div>
                            <div class="profile-usertitle-job"> Manager </div>
                        </div>
                        <div class="sidebar-userpic-btn">
                            <a class="tooltips" href="{{ route('dashboard') }}" data-placement="top" data-original-title="Profile">
                                <i class="material-icons">person_outline</i>
                            </a>
                            <a class="tooltips" href="{{ route('logout') }}" data-placement="top" data-original-title="Logout">
                                <i class="material-icons">input</i>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item start {{ ($currRoute == 'dashboard')  ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="nav-link nav-toggle">
                        <i class="material-icons">dashboard</i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item {{ ($currRoute == 'inventory') || ($currRoute == 'Inventory') || ($currRoute == 'Inventory-List')   ? 'active' : '' }}">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">business_center</i>
                        <span class="title">Inventory</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('Inventory') }}" class="nav-link ">
                                <span class="title">Add New Inventory</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Inventory-List') }}" class="nav-link ">
                                <span class="title">Inventory List</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
@elseif($items[0]['user_type']=='AGENCIES')
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
                                <img src="{{ url('admin/assets/img/dp.jpg') }}" class="img-responsive" alt=""> </div>
                        </div>
                        <div class="profile-usertitle">
                            <div class="sidebar-userpic-name">{{ "welcome" }}</div>
                            <div class="sidebar-userpic-name">{{ $items[0]['fname'] }}</div>
                            <div class="profile-usertitle-job"> Manager </div>
                        </div>
                        <div class="sidebar-userpic-btn">
                            <a class="tooltips" href="{{ route('dashboard') }}" data-placement="top" data-original-title="Profile">
                                <i class="material-icons">person_outline</i>
                            </a>
                            <a class="tooltips" href="{{ route('logout') }}" data-placement="top" data-original-title="Logout">
                                <i class="material-icons">input</i>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item start {{ ($currRoute == 'dashboard')  ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="nav-link nav-toggle">
                        <i class="material-icons">dashboard</i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item {{ ($currRoute == 'inventory') || ($currRoute == 'Inventory') || ($currRoute == 'Inventory-List')   ? 'active' : '' }}">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">business_center</i>
                        <span class="title">Inventory</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('Inventory') }}" class="nav-link ">
                                <span class="title">Add New Inventory</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Inventory-List') }}" class="nav-link ">
                                <span class="title">Inventory List</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
@else
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
                                <img src="{{ url('admin/assets/img/dp.jpg') }}" class="img-responsive" alt=""> </div>
                        </div>
                        <div class="profile-usertitle">
                            <div class="sidebar-userpic-name">{{ "welcome" }}</div>
                            <div class="sidebar-userpic-name">{{ $items[0]['fname'] }}</div>
                            <div class="profile-usertitle-job"> Manager </div>
                        </div>
                        <div class="sidebar-userpic-btn">
                            <a class="tooltips" href="{{ route('dashboard') }}" data-placement="top" data-original-title="Profile">
                                <i class="material-icons">person_outline</i>
                            </a>
                            <a class="tooltips" href="{{ route('logout') }}" data-placement="top" data-original-title="Logout">
                                <i class="material-icons">input</i>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item start {{ ($currRoute == 'dashboard')  ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="nav-link nav-toggle">
                        <i class="material-icons">dashboard</i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item {{ ($currRoute == 'inventory') || ($currRoute == 'Inventory') || ($currRoute == 'Inventory-List')   ? 'active' : '' }}">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">business_center</i>
                        <span class="title">Inventory</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
<!--                        <li class="nav-item">
                            <a href="{{ route('Inventory') }}" class="nav-link ">
                                <span class="title">Add New Inventory</span>
                            </a>
                        </li>-->
                        <li class="nav-item">
                            <a href="{{ route('Inventory-List') }}" class="nav-link ">
                                <span class="title">Inventory List</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
@endif
