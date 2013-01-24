<?php

class What extends Eloquent {

	/**
	 * The name of the table associated with the model.
	 *
	 * @var string
	 */
	public static $table = 'whats';

	/**
	 * Indicates if the model has update and creation timestamps.
	 *
	 * @var bool
	 */
	public static $timestamps = false;

    
    
    public function who()
    {
        return $this->belongs_to('who');
        
    }
    
    
}