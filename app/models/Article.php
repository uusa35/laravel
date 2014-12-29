<?php
/**
 * Created by PhpStorm.
 * User: usamaa
 * Date: 5/12/14
 * Time: 9:33 AM
 */

class Article extends Eloquent {

    protected $table = 'articles';

    protected $fillable = ['title', 'body', 'author','category_id'];

    public static $rules = [
        'title'=>'required|min:3',
        'body'=>'required|min:3',

    ];

    public function category () {
        return $this->belongsTo('categories');
    }


}


