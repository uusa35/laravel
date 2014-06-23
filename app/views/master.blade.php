<html>
<head>
    <meta charset="UTF-8">
    <title>Usama Blog System with CMS</title>
    {{ HTML::style("//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css") }}
    @if(Session::get('locale') == 'ar')
    {{ HTML::style("//cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.1.2/css/bootstrap-rtl.min.css") }}
    <style type="text/css">
        @font-face {
            font-family:"jarida";
            src: url("css/fonts/jarida.eot");
        }
        @font-face {
            font-family:"jarida";
            src: url("css/fonts/jarida.ttf");
        }


        html,body,h1,h2,h3,h4,a,div,span {
            font-family: 'jarida' !important;
        }
    </style>
    @else
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <style type="text/css">
        html,body,h1,h2,h3,h4,a,div,span {
            font-family: 'Oswald', sans-serif;
        }
    </style>
    @endif

    {{ HTML::style("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css") }}
    <!-- Latest compiled and minified JavaScript -->
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js') }}
    {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js") }}

</head>
<body>
    <div class="container">
        @include('layouts.nav')
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif
        @yield('content')
    </div>
</body>
</html>