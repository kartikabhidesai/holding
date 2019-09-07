<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <title>{{$title}}</title>
        
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
           
        <link href="{{ url('admin/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="{{ url('admin/assets/plugins/iconic/css/material-design-iconic-font.min.css') }}">

        <link href="{{ url('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
      
        <link rel="stylesheet" href="{{ url('admin/assets/css/pages/extra_pages.css') }}">
           
        <link rel="shortcut icon" href="{{ url('admin/assets/img/favicon.ico') }}" /> 
    </head>
    <body>
   
        @yield('content')


        <script src="{{ url('admin/assets/plugins/jquery/jquery.min.js') }}" ></script>
        <script src="{{ url('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}" ></script>
        <script src="{{ url('admin/assets/js/pages/extra_pages/login.js') }}" ></script>
        @if(!@empty($js))
          @foreach($js as $value)
                  <script src="{{ url('js/'.$value) }}" type="text/javascript"></script>
          @endforeach
        @endif  
        <script>
            jQuery(document).ready(function() {

                @if (!empty($funinit))
                    @foreach ($funinit as $value)
                        {{ $value }}
                    @endforeach
                @endif
            });
        </script>
    </body>
</html>
