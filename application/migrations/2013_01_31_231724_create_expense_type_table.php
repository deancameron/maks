<?php

class Create_Expense_Type_Table {    

	public function up()
    {
		Schema::create('expense_type', function($table) {
			$table->increments('id');
            $table->integer('expense_id');
            $table->integer('type_id');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('expense_type');

    }

}