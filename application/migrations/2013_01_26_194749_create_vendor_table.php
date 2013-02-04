<?php

class Create_Vendors_Table {    

	public function up()
    {
		Schema::create('vendors', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('vendors');

    }

}