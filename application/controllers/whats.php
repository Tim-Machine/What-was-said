<?php

class Whats_Controller extends Base_Controller {

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
	 * View all of the whats.
	 *
	 * @return void
	 */
	public function get_index()
	{
		$whats = What::all();

		$this->layout->title   = 'Whats';
		$this->layout->content = View::make('whats.index')->with('whats', $whats);
	}

	/**
	 * Show the form to create a new what.
	 *
	 * @return void
	 */
	public function get_create()
	{
		$this->layout->title   = 'New What';
		$this->layout->content = View::make('whats.create');
	}

	/**
	 * Create a new what.
	 *
	 * @return Response
	 */
	public function post_create()
	{
		$validation = Validator::make(Input::all(), array(
			'who' => array('required'),
			'what' => array('required'),
			'ment' => array('required'),
			'active' => array('required'),
		));

		if($validation->valid())
		{
			$what = new What;

			$what->who = Input::get('who');
			$what->what = Input::get('what');
			$what->ment = Input::get('ment');
			$what->active = Input::get('active');

			$what->save();

			Session::flash('message', 'Added what #'.$what->id);

			return Redirect::to('whats');
		}

		else
		{
			return Redirect::to('whats/create')
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * View a specific what.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_view($id)
	{
		$what = What::find($id);

		if(is_null($what))
		{
			return Redirect::to('whats');
		}

		$this->layout->title   = 'Viewing What #'.$id;
		$this->layout->content = View::make('whats.view')->with('what', $what);
	}

	/**
	 * Show the form to edit a specific what.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_edit($id)
	{
		$what = What::find($id);

		if(is_null($what))
		{
			return Redirect::to('whats');
		}

		$this->layout->title   = 'Editing What';
		$this->layout->content = View::make('whats.edit')->with('what', $what);
	}

	/**
	 * Edit a specific what.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function post_edit($id)
	{
		$validation = Validator::make(Input::all(), array(
			'who' => array('required'),
			'what' => array('required'),
			'ment' => array('required'),
			'active' => array('required'),
		));

		if($validation->valid())
		{
			$what = What::find($id);

			if(is_null($what))
			{
				return Redirect::to('whats');
			}

			$what->who = Input::get('who');
			$what->what = Input::get('what');
			$what->ment = Input::get('ment');
			$what->active = Input::get('active');

			$what->save();

			Session::flash('message', 'Updated what #'.$what->id);

			return Redirect::to('whats');
		}

		else
		{
			return Redirect::to('whats/edit/'.$id)
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * Delete a specific what.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function get_delete($id)
	{
		$what = What::find($id);

		if( ! is_null($what))
		{
			$what->delete();

			Session::flash('message', 'Deleted what #'.$what->id);
		}

		return Redirect::to('whats');
	}
}