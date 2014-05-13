<?php
/**
 * Created by PhpStorm.
 * User: usamaa
 * Date: 5/11/14
 * Time: 9:01 AM
 */

class CategoryController extends BaseController {

    public function __construct() {
        $this->beforeFilter('csrf', array('on'=>'post'));
    }

    public function getIndex() {
        return View::make('admin.categories.index')->with('categories', Category::all());
    }

    public function postCreate() {

        $validate = Validator::make(Input::all(), Category::$rules);
        if ($validate->passes()) {
            $category = new Category;
            $category->name = Input::get('name');
            $category->save();
            return Redirect::to('/admin/categories')
                ->withErrors($validate)
                ->with('message','Success .. Category has been created ');
        }
        else {
            return Redirect::to('/admin/categories')
                    ->withErrors($validate)
                    ->with('message','failed to create this category !!!')
                    ->withInput();
        }
    }


    public function postDestroy() {
        $category = Category::find(Input::get('id'));
        if($category) {
        $category->delete();
            return Redirect::to('/admin/categories')
                ->with('message', 'Category deleted');
        }
        else {
        return Redirect::to('admin/categories')
            ->with('message', 'Category is not deleted .. error occured');
        }
    }


} 