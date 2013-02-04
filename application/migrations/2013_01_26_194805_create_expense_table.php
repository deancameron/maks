<?php

class Create_Expenses_Table {    

	public function up()
    {
		Schema::create('expenses', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('name');
			$table->float('amount');
			$table->timestamp('date');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('expenses');

    }

}