
<?php

// responsible for the API arrays 
Route::group(['prefix'=> 'api'],function () {

    Route::resource('articles','ApiArticleController');

});


// responsible for the Backbone Application 
Route::group(['prefix'=>'backbone'], function() {

    Route::get('main',['as'=>'backbone-main','uses'=>'BackboneController@index']);

});


Route::group(['prefix'=>'jeffery'], function () {
    Route::get('backbonetutorial', ['as' => 'backbone-tutorial', 'uses' => 'BackboneTutorialController@index']);
    }
);


Route::get('/','HomeController@index');
Route::get('contactus','HomeController@contactus');
Route::get('aboutus','HomeController@aboutus');
Route::get('products', 'HomeController@products');


/*
|--------------------------------------------------------------------------
| All-Users Areaa
|--------------------------------------------------------------------------
|*/

    // LanguageController
    Route::post('/lang', array(
        'as' => 'lang-chooser',
        'uses' => 'LanguageController@chooser')
    );
    // Articles system
    Route::resource('articles','ArticleController', array('only'=> array('index', 'show')));




/*
|--------------------------------------------------------------------------
| Guest Area
|--------------------------------------------------------------------------
|*/
Route::group(
    array('before'=> 'guest'), function () {

    /*
	|--------------------------------------------------------------------------
	| GET Methods
	|--------------------------------------------------------------------------
	|*/
    // Account create ==== Registeration Form
    Route::get('account/register',array(
        'as'=>'account-register',
        'uses'=> 'AccountController@getRegister'
    ));

    // Activation Account
    Route::get('account/activate/{code}' , array(
        'as' => 'account-activate',
        'uses' => 'AccountController@getActivate'
    ));

    // Account login ==== Login Form
    Route::get('account/login', array(
        'as' => 'account-login',
        'uses' => 'AccountController@getLogin'
    ));

});


    /*
	|--------------------------------------------------------------------------
	| Post Methods
	|--------------------------------------------------------------------------
	|*/


Route::group(array('before'=> 'csrf'), function() {


        // Account Create ==== Registeration Form
        Route::post('account/register',array(
            'as'=>'account-register',
            'uses'=> 'AccountController@postRegister'
        ));

        // Account login ==== Login Form
        Route::post('account/login', array(
            'as' => 'account-login',
            'uses' => 'AccountController@postLogin'
        ));


    });



/*
|--------------------------------------------------------------------------
| Authentication Area
|--------------------------------------------------------------------------
*/
Route::group(array('before' => 'auth'), function () {

    // ACCOUNT LOGOUT
    Route::get('account/logout',array(
        'as' => 'account-logout',
        'uses' => 'AccountController@getLogout'
    ));

});


/*
|--------------------------------------------------------------------------
| Admin Area
|--------------------------------------------------------------------------
*/

Route::group(array('before'=>'admin'),function () {
    Route::group(array('prefix'=>'admin'), function () {
        Route::controller('categories', 'CategoryController');
        Route::controller('products', 'ProductController');
        Route::resource('articles', 'AdminArticleController');
        Route::get('/', 'HomeController@admin');
    });
});

