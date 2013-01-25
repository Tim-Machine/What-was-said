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
            $entry->score   =   0; 
            
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
    
    
    
    public function action_vote()
    {   
        
        $erromsg = "<div class=\"alert alert-error\">Something Went Wrong..</div>";
        
        // make sure all variables are set 
        if( is_null(Input::get('direction')) || is_null(Input::get('id')) )
        {
            return $erromsg;
        }
        $id = Input::get("id");
        
        //checking to see if they have voted
        if(!$this->canVote($id))
        {
            return "<div class=\"alert alert-error\">You have already voted</div>"; 
        }
            
        
        // get direction
        $dir = Input::get('direction');
        
        // get entries
        $data = What::find($id);
        
        //make sure min score is set
        if($data->score == ""){
            $data->score = 0 ; 
        }
        
        
        //change score
        if( $dir == "up")
        {
            $data->score = $data->score + 1; 
        }
        if($dir == "down"){
            $data->score = $data->score - 1; 
        }
        
         
        /// save the score
        if($data->save())
        {
            $this->setCookies($id);
            return "<div class=\"alert alert-success\">Thanks for your vote</div>";
        }
        else{
            return $erromsg;
        }
        
        
        return "working...";
    }
    
    private function canVote($id){
        $canVote = true;
        
        
        if(!is_null(Cookie::get('voted')))
        {
            $cookieArr = explode("_", Cookie::get('voted'));
            
            if(in_array($id, $cookieArr))
                {
                $canVote = false;
                }
        }
        
        return $canVote;
    }
    
    private function setCookies($id)
    {   
        
        if(is_null(Cookie::get('voted')))
        {
            $cookie = Cookie::get('voted')."_".$id;
        }
        else{
            $cookie = $id;
        }
        
        Cookie::forever('voted', $cookie); 
        
    }
    
}