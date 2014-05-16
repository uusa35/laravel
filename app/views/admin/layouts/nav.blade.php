<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ URL::to('/admin') }}" name="top">{{ (Auth::check()) ? 'Admin Panel' : '' }}</a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">

        <ul class="nav navbar-nav">
            @if(Auth::user()->admin == 1)
            <li><a href="#"><i class="icon-home icon-white"></i> reset password</a></li>
            <li ><a href="{{ URL::to('admin/categories') }}"><i class="icon-file icon-white"></i> Categories </a></li>
            <li ><a href="{{ URL::to('admin/products/index') }}"><i class="icon-file icon-white"></i> Products </a></li>
            <li ><a href="{{ URL::route('admin.articles.index') }}"><i class="icon-file icon-white"></i> Articles </a></li>
            <li ><a href="{{ URL::to('admin/products/create') }}"><i class="icon-file icon-white"></i> Create Products </a></li>
            @endif
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Dropdown header</li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </li>
        </ul>
        <form class="navbar-form navbar-left">
            <input class="form-control col-lg-8" placeholder="Search" type="text">
        </form>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Link</a></li>
            <li class="dropdown open">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ URL::to('admin/products') }}"><i class="icon-wrench"></i> Admin Panel</a></li>
                    <li><a href="{{ URL::to('/') }}"><i class="icon-wrench"></i> Dashboard </a></li>
                    <li><a href="#"><i class="icon-wrench"></i> Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ URL::route('account-logout') }}"><i class="icon-share"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>


