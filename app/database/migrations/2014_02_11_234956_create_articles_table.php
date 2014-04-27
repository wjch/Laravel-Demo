<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles',function($table)
		{
		  $table->increments('id');
		  $table->string('title');
		  $table->text('summary');
		  $table->longText('content');
		  $table->string('author')->default('任课老师');
		  $table->string('type');
		  $table->timestamp('add_time');
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
		Schema::drop('articles');
	}

}
