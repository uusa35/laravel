<?php
/**
 * Created by PhpStorm.
 * User: usamaa
 * Date: 4/23/14
 * Time: 9:05 AM
 */

class ArticleController extends BaseController {

    protected $article;
    public function __construct(Article $article) {
    $this->article = $article;
    }

    public function index () {
        $articles = $this->article->paginate(3);
        return View::make('admin.articles.index', compact('articles'));
    }

    public function show ($id) {
        $article = $this->article->find($id);
        return View::make('admin.articles.show', compact('article'));
    }

    public function create() {
        return View::make('admin.articles.create');
    }

    public function store() {

        $input = array_except(Input::all(), 'method');

        $validate = Validator::make($input, Article::$rules);
        if ($validate->passes()) {

            $this->article->author = $input['author'];
            $this->article->title = $input['title'];
            $this->article->title = $input['article_category_id'];
            $this->article->body = $input['body'];
            $this->article->save();
            Session::set('message', 'Your Article successfully added ;) ');
            return Redirect::to('admin/articles');
        }
        return Redirect::route('articles.create')
            ->withInput()
            ->withErrors($validate->errors())
            ->with(['message'=> 'Error Occured !!!']);
    }

    public function edit ($id) {
        $article = $this->article->findOrFail($id);
        if(is_null($article)) {
            return View::make('admin.articles')->with(['message'=>'no article with this id']);
        }
        return View::make('admin.articles.edit', compact('article') );
    }

    public function update($id) {
      $input = array_except(Input::get(), '_method');
      $validate = Validator::make($input, Article::$rules);
        if($validate->passes()) {
            $article = $this->article->find($id);
            $article->update($input);
            return Redirect::to('admin/articles')->with(['message'=> 'updated successfully !!']);
        }
        return Redirect::to('admin/articles')->with(['message' =>'Error occured .. Not Updated !!! ']);
    }

    public function destroy ($id) {
        if($this->article->destroy($id)) {
        return Redirect::to('admin/articles')->with(['message'=>'Article Deleted .. success']);
        }
        return Redirect::to('admin/articles')->with(['message'=>'Nothing happened']);
    }

}