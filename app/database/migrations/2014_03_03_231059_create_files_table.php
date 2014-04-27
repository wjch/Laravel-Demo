<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('files',function($table)
		{
		  $table->increments('id');
		  $table->string('fname');
		  $table->timestamps('addtime');
		  $table->string('fpath');
		  $table->string('addauthor');
		  $table->string('filetype');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
