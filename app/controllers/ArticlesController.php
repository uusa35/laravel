<?php
/**
 * Created by PhpStorm.
 * User: usamaa
 * Date: 4/23/14
 * Time: 9:05 AM
 */

class ArticlesController extends BaseController {

    protected $article;
    public function __construct(Article $article) {
    $this->article = $article;
    }

    public function index () {
        $articles = $this->article->paginate(3);
        return View::make('layouts.home', compact('articles'));
    }

    public function show ($id) {

        $article = $this->article->find($id);
        return View::make('layouts.articles.show', compact('article'));
    }

    public function create() {
        return View::make('layouts.articles.create');
    }

    public function store() {

        $input = array_except(Input::all(), 'method');

        $validate = Validator::make($input, Article::$rules);
        if ($validate->passes()) {

            $this->article->author = $input['author'];
            $this->article->title = $input['title'];
            $this->article->body = $input['body'];
            $this->article->save();
            Session::set('message', 'Your Article successfully added ;) ');
            return Redirect::to('articles');
        }
        return Redirect::route('articles.create')
            ->withInput()
            ->withErrors($validate->errors())
            ->with(['message'=> 'Error Occured !!!']);
    }

    public function edit ($id) {
        $article = $this->article->findOrFail($id);
        if(is_null($article)) {
            return View::make('layouts.articles')->with(['message'=>'no article with this id']);
        }
        return View::make('layouts.articles.edit', compact('article') );
    }

    public function update($id) {
      $input = array_except(Input::get(), '_method');
      $validate = Validator::make($input, Article::$rules);
        if($validate->passes()) {
            $article = $this->article->find($id);
            $article->update($input);
            return Redirect::to('articles')->with(['message'=> 'updated successfully !!']);
        }
        return Redirect::to('articles')->with(['message' =>'Error occured .. Not Updated !!! ']);
    }

    public function destroy ($id) {
        if($this->article->destroy($id)) {
        return Redirect::to('articles')->with(['message'=>'Article Deleted .. success']);
        }
        return Redirect::to('articles')->with(['message'=>'Nothing happened']);
    }

} 