<?php


class PostsCommentsController extends \BaseController {

    public function __construct(CommentRepositoryInterface $comments)
    {
        $this->comments = $comments;
    }

	/**
	 * Display a listing of the resource.
	 * GET /comments
	 *
	 * @return Response
	 */
	public function index($post_id)
	{
		return $this->comments->findAll($post_id);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /comments/create
	 *
	 * @return Response
	 */
	public function create($post_id)
	{
		$comment = $this->comments->instance(array('post_id' => $post_id));
        return View::make('comments._form', compact('comment'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /comments
	 *
	 * @return Response
	 */
	public function store($post_id)
	{
		return $this->comments->store($post_id, Input::all());
	}

	/**
	 * Display the specified resource.
	 * GET /comments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($post_id, $id)
	{
		return $this->comments->findById($post_id, $id);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /comments/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($post_id, $id)
	{
		$comment = $this->comments->findById($post_id, $id);
        return View::make('comments._form', compact('comment'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /comments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($post_id, $id)
	{
		return $this->comments->update($post_id, $id, Input::all());
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /comments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($post_id, $id)
	{
		$this->comments->destroy($post_id, $id);
        return '';
	}

}
