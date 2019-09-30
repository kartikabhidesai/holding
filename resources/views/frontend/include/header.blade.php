<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="{{ url('public/frontend/css/reset.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ url('public/frontend/css/plugins.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ url('public/frontend/css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ url('public/frontend/css/color.css') }}">
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="{{ url('public/frontend/images/favicon.ico') }}">
    @if (!empty($css)) 
    @foreach ($css as $value) 
    @if(!empty($value))
    <link rel="stylesheet" href="{{ asset('public/css/'.$value) }}">
    @endif
    @endforeach
    @endif
</head>