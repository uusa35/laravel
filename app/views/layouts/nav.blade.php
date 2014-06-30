<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ URL::to('/') }}" name="top">{{ (Auth::check()) ? Lang::get('nav.dashboard') : Lang::get('nav.mainpage') }}</a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">

        <ul class="nav navbar-nav">

            <li><a href="{{ URL::to('products') }}"><i class="icon-home icon-white"></i> Products </a></li>
            <li><a href="{{ URL::to('aboutus') }}"><i class="icon-home icon-white"></i> about us </a></li>
            <li><a href="{{ URL::to('contactus') }}"><i class="icon-home icon-white"></i> contact us </a></li>
            <li><a href="{{ action('ArticleController@index') }}"><i class="icon-home icon-white"></i> Articles </a></li>
            @if(! Auth::check())
            <li><a href="{{ URL::route('account-register') }}"><i class="icon-home icon-white"></i> Register</a></li>
            <li ><a href="{{ URL::route('account-login') }}"><i class="icon-file icon-white"></i> Login </a></li>
            @endif
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Link 5 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">English</a></li>
                    <li><a href="#">Arabic</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Dropdown header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                </ul>
            </li>
        </ul>
        <form class="navbar-form navbar-left" action="{{ action('LanguageController@chooser') }}" method="post">
<!--            <input class="form-control col-lg-8" placeholder="Search" type="text">-->
                <select class="form-control" name="locale">
                    <option value="en" {{ (Session::get('locale') == 'en') ? 'selected' : '' }} >English</option>
                    <option value="ar" {{ (Session::get('locale') == 'ar') ? 'selected' : '' }} >Arabic</option>
                </select>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @if(Auth::check())
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Link</a></li>
            <li class="dropdown open">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    @if(Auth::user()->admin)
                    <li><a href="{{ URL::to('/admin') }}"><i class="icon-wrench"></i> Admin Panel </a></li>
                    @endif
                    <li><a href="{{ URL::to('/') }}"><i class="icon-wrench"></i> Dashboard </a></li>
                    <li><a href="#"><i class="icon-wrench"></i> Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ URL::route('account-logout') }}"><i class="icon-share"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        @endif
    </div>
</div>


