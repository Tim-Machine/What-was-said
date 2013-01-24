<?php

class Home_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| The Default Controller
	|--------------------------------------------------------------------------
	|
	| Instead of using RESTful routes and anonymous functions, you might wish
	| to use controllers to organize your application API. You'll love them.
	|
	| This controller responds to URIs beginning with "home", and it also
	| serves as the default controller for the application, meaning it
	| handles requests to the root of the application.
	|
	| You can respond to GET requests to "/home/profile" like so:
	|
	|		public function action_profile()
	|		{
	|			return "This is your profile!";
	|		}
	|
	| Any extra segments are passed to the method as parameters:
	|
	|		public function action_profile($id)
	|		{
	|			return "This is the profile for user {$id}.";
	|		}
	|
	*/

	public function action_index()
	{   
        
        $entries = What::with('who')->get();
         
		return View::make('home.index')
                ->with('entries', $entries);
	}
    
    
    
    
    public function action_create(){
        
        $status = "";
        
        if($_POST)
        {
            $entry = new What;
            
            $entry->who_id  =   Input::get('who_id');
            $entry->who     =   Input::get('who_id');
            $entry->what    =   Input::get('what');
            $entry->ment    =   Input::get('ment');
            
            if($entry->save())
            {
                $status = "Entry Saved!";
            }
            else{
                $status = "Something went wrong";
            }
        }
        
        $users = Who::lists('name','id');
    return View::make('temp')
            ->with('status',$status)
            ->with('users', $users);
            ;
        
    }
    
    
    
    
}