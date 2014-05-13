<?php
/**
 * Created by PhpStorm.
 * User: usamaa
 * Date: 5/11/14
 * Time: 8:59 AM
 */

class Category extends Eloquent {
    protected $fillable = array('name');
    protected $table = 'categories';
   // protected $guarded = array('name','id', 'created_at', 'updated_at');


    public static $rules = array(
        'name' => 'required|min:3'
    );

    public function product () {
    return $this->hasMany('Categories');
    }
} 