<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersCategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_categories', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->boolean('admin');
			$table->boolean('moderator');
			$table->boolean('user');
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
		Schema::drop('users_categories');
	}

}
