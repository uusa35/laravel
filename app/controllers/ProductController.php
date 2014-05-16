<?php
/**
 * Created by PhpStorm.
 * User: usamaa
 * Date: 5/11/14
 * Time: 2:08 PM
 */

class ProductController extends BaseController {

    public function __contruct() {
        $this->beforeFilter('csrf', array('on'=>'post'));

    }


    // show the products in a table - just for admin
    public function getIndex() {
        $products = Product::paginate(15);
        // this will include index and getCreate method == create a product
        return View::make('admin.products.index', compact('products', $products));
    }

    // create product form
    public function getCreate () {
        $categories = Category::lists('name','id');
        return View::make('admin.products.create', compact('categories'));
    }

    //  post to product form
    public function postCreate () {
        $input = array_except(Input::all(), 'post');
        $validate = Validator::make($input, Product::$rules);
        if($validate->passes()) {
            $product = new Product;
            $product->category_id = Input::get('category_id');
            $product->title = Input::get('title');
            $product->description = Input::get('description');
            $image = Input::file('image');
            $file = date('y-m-d-H-i-s')."-".($image->getClientOriginalName());
            Image::make($image->getRealPath())->resize('450', '400')->save(public_path('images/'.$file));
            $product->availability = Input::get('availability');
            $product->price = Input::get('price');
            $product->image = 'images/'.$file;
            if($product->save()) {
            return Redirect::to('admin/products/index')
                ->with('message', 'product created .. success');
            }
            else {
                return Redirect::to('admin/products/index')
                    ->withInputs()
                    ->with('message', 'couldnt save the product .. error occured');
            }
        }
        else {
            return Redirect::to('admin/products/create')
                    ->withErrors($validate)
                    ->withInput()
                    ->with('message', 'can not create product .. error occured');
        }
    }

    public function postDestroy() {
        $product = Product::find(Input::get('id'));
        if($product) {
            File::delete('public/images/'.$product->image);
            $product->delete();
            return Redirect::to('admin/products/index')
                            ->with('message', 'product deleted ..');
        }
        else {
            return Redirect::to('admin/products/index')
                ->with('message', 'product not deleted ..failure !! ');
        }
    }

    public function postAvail () {
        $availability = Input::all();
        $product = new Product;
        $product->availability = Input::get('availability');
        if($product->save()) {
            return Redirect::to('admin/products')->with('message','Availability updated successfully');
        }
        else {
            return Redirect::to('admin/products')->with('message','Update Failed');
        }
    }

} 