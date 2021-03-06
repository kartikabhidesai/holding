<!DOCTYPE html>
<html lang="en">
    @include('admin.include.header')
    <body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
        <div class="page-wrapper">  
            @include('admin.include.bodyheader')
            <div class="page-container">
                @include('admin.include.leftpanel.admin_sidebar')
                <div class="page-content-wrapper">
                    <div class="page-content">
                        @include('admin.include.breadcrumb')
                        @yield('content')
                    </div>
                </div>    
                @include('admin.include.bodyfooter')
            </div>
            @include('admin.include.footer')
        </div>
         <style>
            .has-error {
                border-color: red!important;
                border-width: 1px!important;
            }
            .form-control.error {
                border: 1px solid red!important;
            }
            label.error {
                display: none!important;
            }
        </style>
    </body>
</html>