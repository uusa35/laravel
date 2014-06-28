<?php
/**
 * Created by PhpStorm.
 * User: usamaa
 * Date: 5/11/14
 * Time: 2:17 PM
 */

class Product extends Eloquent {

    protected $fillable = array('category_id', 'title', 'description','price', 'image', 'availability');
    public static $rules = array(
        'category_id' => 'required|integer',
        'title' => 'required|min:2',
        'description' => 'required|min:2',
        'price' => 'required|numeric|max:999.99|min:1',
        'image' => 'required',
        'availability' => 'required|integer'
    );

    public function category() {
        return $this->belongsTo('Category');
    }
} 