<?php

class Create_Whats_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{	
		Schema::create('whats', function($table)
		{
			$table->increments('id');

			$table->integer('who');
			$table->text('what');
			$table->text('ment');
			$table->integer('active');
            $table->integer('who_id');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('whats');
	}

}