<?php

class Blogs_Controller extends Base_Controller {

	/**
	 * The layout being used by the controller.
	 *
	 * @var string
	 */
	public $layout = 'layouts.scaffold';

	/**
	 * Indicates if the controller uses RESTful routing.
	 *
	 * @var bool
	 */
	public $restful = true;

	/**
	 * View all of the blogs.
	 *
	 * @return void
	 */
	public function get_index()
	{
		$blogs = Blog::all();

		$this->layout->title   = 'Blogs';
		$this->layout->content = View::make('blogs.index')->with('blogs', $blogs);
	}

	/**
	 * Show the form to create a new blog.
	 *
	 * @return void
	 */
	public function get_create()
	{
		$this->layout->title   = 'New Blog';
		$this->layout->content = View::make('blogs.create');
	}

	/**
	 * Create a new blog.
	 *
	 * @return Response
	 */
	public function post_create()
	{
		$validation = Validator::make(Input::all(), array(
			'title' => array('required'),
			'content' => array('required'),
			'urlslug' => array('required'),
		));

		if($validation->valid())
		{
			$blog = new Blog;

			$blog->title = Input::get('title');
			$blog->content = Input::get('content');
			$blog->urlslug = Input::get('urlslug');

			$blog->save();

			Session::flash('message', 'Added blog #'.$blog->id);

			return Redirect::to('blogs');
		}

		else
		{
			return Redirect::to('blogs/create')
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * View a specific blog.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_view($id)
	{
		$blog = Blog::find($id);

		if(is_null($blog))
		{
			return Redirect::to('blogs');
		}

		$this->layout->title   = 'Viewing Blog #'.$id;
		$this->layout->content = View::make('blogs.view')->with('blog', $blog);
	}

	/**
	 * Show the form to edit a specific blog.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_edit($id)
	{
		$blog = Blog::find($id);

		if(is_null($blog))
		{
			return Redirect::to('blogs');
		}

		$this->layout->title   = 'Editing Blog';
		$this->layout->content = View::make('blogs.edit')->with('blog', $blog);
	}

	/**
	 * Edit a specific blog.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function post_edit($id)
	{
		$validation = Validator::make(Input::all(), array(
			'title' => array('required'),
			'content' => array('required'),
			'urlslug' => array('required'),
		));

		if($validation->valid())
		{
			$blog = Blog::find($id);

			if(is_null($blog))
			{
				return Redirect::to('blogs');
			}

			$blog->title = Input::get('title');
			$blog->content = Input::get('content');
			$blog->urlslug = Input::get('urlslug');

			$blog->save();

			Session::flash('message', 'Updated blog #'.$blog->id);

			return Redirect::to('blogs');
		}

		else
		{
			return Redirect::to('blogs/edit/'.$id)
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * Delete a specific blog.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function get_delete($id)
	{
		$blog = Blog::find($id);

		if( ! is_null($blog))
		{
			$blog->delete();

			Session::flash('message', 'Deleted blog #'.$blog->id);
		}

		return Redirect::to('blogs');
	}
}