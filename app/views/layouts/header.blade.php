<meta charset="UTF-8">
<title>Usama Blog System with CMS</title>
{{ HTML::style("//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css") }}
@if(Session::get('locale') == 'ar')
    {{ HTML::style("//cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.1.2/css/bootstrap-rtl.min.css") }}
    <style type="text/css">
        @font-face {
            font-family:"jarida";
            src: url("fonts/jarida.eot");
        }
        @font-face {
            font-family:"jarida";
            src: url("fonts/jarida.ttf");
        }


        html,body,h1,h2,h3,h4,a,div,span {
            font-family: 'jarida' !important;
        }
    </style>
@else
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <style type="text/css">
        @font-face {
            font-family:"jarida";
            src: url("fonts/jarida.eot");
        }
        @font-face {
            font-family:"jarida";
            src: url("fonts/jarida.ttf");
        }
        html,body,h1,h2,h3,h4,a,div,span {
            font-family: 'Oswald', 'jarida' ;
        }
    </style>
@endif
{{ HTML::style("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css") }}
@section('header')

@stop
@section('footer')
    {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js') }}
    {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js") }}
@stop