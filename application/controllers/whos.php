<?php

class Whos_Controller extends Base_Controller {

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
	 * View all of the whos.
	 *
	 * @return void
	 */
	public function get_index()
	{
		$whos = Who::all();

		$this->layout->title   = 'Whos';
		$this->layout->content = View::make('whos.index')->with('whos', $whos);
	}

	/**
	 * Show the form to create a new who.
	 *
	 * @return void
	 */
	public function get_create()
	{
		$this->layout->title   = 'New Who';
		$this->layout->content = View::make('whos.create');
	}

	/**
	 * Create a new who.
	 *
	 * @return Response
	 */
	public function post_create()
	{
		$validation = Validator::make(Input::all(), array(
			'name' => array('required'),
		));

		if($validation->valid())
		{
			$who = new Who;

			$who->name = Input::get('name');

			$who->save();

			Session::flash('message', 'Added who #'.$who->id);

			return Redirect::to('whos');
		}

		else
		{
			return Redirect::to('whos/create')
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * View a specific who.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_view($id)
	{
		$who = Who::find($id);

		if(is_null($who))
		{
			return Redirect::to('whos');
		}

		$this->layout->title   = 'Viewing Who #'.$id;
		$this->layout->content = View::make('whos.view')->with('who', $who);
	}

	/**
	 * Show the form to edit a specific who.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_edit($id)
	{
		$who = Who::find($id);

		if(is_null($who))
		{
			return Redirect::to('whos');
		}

		$this->layout->title   = 'Editing Who';
		$this->layout->content = View::make('whos.edit')->with('who', $who);
	}

	/**
	 * Edit a specific who.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function post_edit($id)
	{
		$validation = Validator::make(Input::all(), array(
			'name' => array('required'),
		));

		if($validation->valid())
		{
			$who = Who::find($id);

			if(is_null($who))
			{
				return Redirect::to('whos');
			}

			$who->name = Input::get('name');

			$who->save();

			Session::flash('message', 'Updated who #'.$who->id);

			return Redirect::to('whos');
		}

		else
		{
			return Redirect::to('whos/edit/'.$id)
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * Delete a specific who.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function get_delete($id)
	{
		$who = Who::find($id);

		if( ! is_null($who))
		{
			$who->delete();

			Session::flash('message', 'Deleted who #'.$who->id);
		}

		return Redirect::to('whos');
	}
}