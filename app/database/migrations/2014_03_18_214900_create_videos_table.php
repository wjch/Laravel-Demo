<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('videos',function($table)
		{
		  $table->increments('id');
		  $table->string('vname');
		  $table->timestamps('addtime');
		  $table->string('vpath');
		  $table->string('addauthor');
		  $table->string('filetype');
		  $table->string('filesize');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('videos', function(Blueprint $table)
		{
			Schema::drop('videos');
		});
	}

}
