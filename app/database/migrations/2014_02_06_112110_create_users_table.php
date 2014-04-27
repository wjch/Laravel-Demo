<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//build the users table;
		Schema::create('users',function($table)
		{
		  $table->increments('id');
		  $table->string('email',150)->nullable;
		  $table->string('username',150);
		  $table->string('password');
		  $table->boolean('active');
		  $table->boolean('admin');
		  $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//drop the users table;
		Schema::drop('users');
	}

}
