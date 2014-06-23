<html>
<head>
    <meta charset="UTF-8">
    <title>Usama Blog System with CMS</title>
    {{ HTML::style("//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css") }}
    <!--{{ HTML::style("//cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.1.2/css/bootstrap-rtl.min.css") }}-->
    {{ HTML::style("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css") }}
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified JavaScript -->
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js') }}
    {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js") }}
    {{ HTML::script('//tinymce.cachefly.net/4.0/tinymce.min.js') }}
    <style type="text/css">
        body {
        font-family: 'Oswald', sans-serif;
        }
    </style>
    <script type="text/javascript">
        tinymce.init({selector:'textarea'});
    </script>
</head>
<body>
    <div class="container">

        @include('admin.layouts.nav')

        @if(Session::has('message'))
        <div class="alert alert-dismissable alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p> {{ Session::get('message') }}.</p>
        </div>
        @endif
        @yield('content')
    </div>
</body>
</html>