<?php
/**
 * Created by PhpStorm.
 * User: usamaa
 * Date: 4/24/14
 * Time: 10:17 AM
 */

class LanguageController extends BaseController {

    public function chooser () {
        $input = Input::get('locale');
        Session::set('locale', $input);
        return Redirect::back();
    }

} 