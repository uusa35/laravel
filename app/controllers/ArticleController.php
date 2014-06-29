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
        return View::make('layouts.articles.index', compact('articles'));
    }

    public function show ($id) {
        $article = $this->article->find($id);
        return View::make('layouts.articles.show', compact('article'));
    }

}