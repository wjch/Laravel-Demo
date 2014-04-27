<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadsTable extends Migration {

	public function up()
	{
		Schema::create('uploads',function($table)
		{
		  $table->increments('id');
		  $table->string('fname');
		  $table->timestamps('addtime');
		  $table->string('fpath');
		  $table->string('addauthor');
		  $table->string('filetype');

		});
	}

	public function down()
	{
		Schema::table('uploads', function(Blueprint $table)
		{
			Schema::drop('uploads');
		});
	}

}
