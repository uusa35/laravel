<?php
/**
 * Created by PhpStorm.
 * User: usama_000
 * Date: 5/3/14
 * Time: 7:25 PM
 */

class AccountController extends BaseController {


    // Account getLogin  => Registeration Form
    public function getCreate() {
        return View::make('layouts.account.create');
    }

    // Account getCreate => post from the Registeration form
    public function postCreate () {
        $input = array_except(Input::get(), 'method');
        $validate = Validator::make($input, User::$rules);
        $code = str_random(25);
        if ($validate->passes()) {
            echo' working ';
            $user = User::create(array(

                'username' => Input::get('username'),
                'email' => Input::get('email'),
                'password' => Hash::make(Input::get('password')),
                'active' => true,
                'admin' => false,
                'activation_code' => $code
            ), false);
            if($user) {
                Mail::send('emails.email', array('name'=> Input::get('username'), 'link'=> URL::route('account-activate', $code)), function ($message) use ($user) {
                $message->to($user->email, $user->username)->subject('Subject');
                });
                return Redirect::to('/')->with('message','Thanks for registeration');
            }
            else {
                return Redirect::to('/')->with('message','Registeration is not complete');
            }
        }
        else {
            return Redirect::to('/account/create')->withErrors($validate)->withInput($input);
        }
    }

    // Account Activation
    public function getActivate ($code) {

            $user = User::findByactivation_code($code);
            if ($user)
            {
                // User activation success
                return Redirect::to('account/login')->with('message', 'Thank you for Activation .. your account activated correctly .. please login');
            }
            else
            {
                // User activation failed
                return Redirect::to('/')->with('message', 'Activation is not complete .. error occured');
            }
    }


    // GET LOGIN FORM
    public function getLogin () {
       return View::make('layouts.account.login');
    }

    // POST TO LOGIN FORM
    public function postLogin () {
        // Set login credentials
        $credentials = [
          'email' => Input::get('email'),
          'password' => Input::get('password'),
        ];
        Input::get('rememberme') === '1' ? 'true' : 'false';
        $user = Auth::attempt($credentials, Input::get('rememberme'));
        return Redirect::to('/');
    }


    // LOGOUT
    public function getLogout () {
        Auth::logout();
        return Redirect::Intended('/');
    }
}