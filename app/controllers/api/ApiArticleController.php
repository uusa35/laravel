<?php

class ApiArticleController extends BaseController {


	protected $article;
	public function __construct(Article $article) {
		$this->article = $article;
	}
	/**
	 * Display a listing of the resource.
	 * GET /api/apiarticle
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$articles = $this->article->all();
		return Response::json(['data'=>$articles->toArray()],200);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /api/apiarticle/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		//return Response::json(['status'=>'success',200]);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /api/apiarticle
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$author = Input::get('data.author');
		$title = Input::get('data.title');
		$body = Input::get('data.body');
		$category_id = Input::get('data.category');
		$article = $this->article->create([
			'author'		=> $author,
			'title'			=> $title,
			'body'			=> $body,
			'category_id'	=> $category_id,
		]);
		if($article) {
			return Response::json(['code'=>'Success01'],200);
		}
		return Response::json(['code'=>'Error01'],404);
	}

	/**
	 * Display the specified resource.
	 * GET /api/apiarticle/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$article = $this->article->find($id);
		if($article) {
			return Response::json(['data'=> $article->toArray()],200);
		}
		return Response::json(['error'=> ['message'=>'this id is not found !!!','code'=>'E-1']],404);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /api/apiarticle/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /api/apiarticle/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /api/apiarticle/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}