<!DOCTYPE html>
<html lang="en">
    @include('frontend.include.header')
    <body>
    @include('frontend.include.loader')
    <div id="main">
            @include('frontend.include.bodyheader')
                        
                        @yield('content')
                     
                @include('frontend.include.bodyfooter')
            
            @include('frontend.include.footer')
    </div>
    </body>
</html>
