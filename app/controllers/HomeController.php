<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
        return View::make('layouts.home');

	}

    public function admin () {
       return View::make('admin.layouts.home');
    }

    public function contactus() {
        return View::make('layouts.contactus');
    }

    public function aboutus () {
        return View::make('layouts.aboutus');
    }

}
