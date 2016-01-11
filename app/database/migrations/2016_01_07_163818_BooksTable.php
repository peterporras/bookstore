<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books', function($table) {
		    $table->increments('id');
		    $table->string('title', 100);
		    $table->string('author', 100);
		    $table->string('genre', 100);
		    $table->string('image');
		    $table->text('description');
		    $table->date('published');
		    $table->enum('format', array('Kindle', 'Hardcover', 'Paperback', 'MP3 CD'));
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
		Schema::drop('books');
	}

}
