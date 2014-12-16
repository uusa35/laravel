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
		return $this->article->all();
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