<html>
<head>
    @include('layouts.header')
    @yield('header')
</head>
<body>
    <div class="container">
<!--        <h1> {{ Session::get('locale')}}</h1>-->
<!--        <hr/>-->
<!--        <h1> {{ App::environment() }}</h1>-->
<!--        <hr/>-->
        @include('layouts.nav')
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif
        @yield('content')
    </div>
    @yield('footer')

</body>
</html>