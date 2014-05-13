<?php
/**
 * Created by PhpStorm.
 * User: usamaa
 * Date: 4/28/14
 * Time: 1:50 PM
 */

class LoginController extends BaseController {

    //public $table = 'users';

    public function getLogin () {
        return View::make('layouts.login');
    }

    public function postLogin() {
        $input = array_except(Input::get(), 'method');
        $email = Input::get('email');
        $password = Input::get('password');
//        $user = new User();
//        $user->email = $email;
//        $user->password = Hash::make($password);
//        $user->active = true;
//        $user->save();

        if(Auth::attempt(array('email' => $email, 'password' => $password))) {

            if(Auth::user()->email == 'usama@usama.com') {
                return Redirect::to('admin/dashboard');
            }
            elseif(Auth::user()->email == 'ahmed@ahmed.com') {
                return Redirect::to('moderator/dashboard');
            }
        }
        else {
            return 'failure';
        }
        return 'failure 2';

    }
} 