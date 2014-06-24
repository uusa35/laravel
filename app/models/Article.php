<?php
/**
 * Created by PhpStorm.
 * User: usamaa
 * Date: 5/12/14
 * Time: 9:33 AM
 */

class Article extends Eloquent {

    protected $table = 'articles';

    public static $rules = [
        'title'=>'required|min:3',
        'body'=>'required|min:3',
        'category_id' => 'required'
    ];

    public function category () {
        return $this->belongsTo('categories');
    }


}


