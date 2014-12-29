<meta charset="UTF-8" xmlns="http://www.w3.org/1999/html">
<title>Usama Blog System with CMS</title>
{{ HTML::style("//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css") }}

        <style type="text/css">
        @import url(http://fonts.googleapis.com/earlyaccess/droidarabickufi.css);
        @import url(http://fonts.googleapis.com/css?family=Open+Sans);
            html,body,h1,h2,h3,h4,a,div,span,div,form,input,table,tr,td {
                font-family: 'Droid Arabic Kufi', 'Open Sans';

            }
        </style>

@if(Session::get('locale') == 'ar')
    {{ HTML::style("//cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.1.2/css/bootstrap-rtl.min.css") }}
@else

@endif
{{ HTML::style("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css") }}


@section('header')

@stop

{{--footer in case backbone page is loaded--}}
@section('backbone')
    @include('scripts.templates')
    {{ HTML::script('js/backbone/backbone.js') }}
@stop

{{--footer for backboneTutorial for jeffery ways--}}
@section('backbonetutorial')
    @include('scripts.backbonetutorial')
    {{ HTML::script('/js/backbone/backbonetutorial.js') }}
@stop



@section('footer')
    {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js') }}
    {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js") }}
    {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore-min.js") }}
    {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.2/backbone-min.js") }}
    @if(Request::segment(1) === 'backbone')
        <!--backbone section-->
        @yield('backbone')
    @else
        <!--backbonetutorial section-->
        @yield('backbonetutorial')
    @endif
@stop