<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionsTable extends Migration {

	public function up()
	{
		Schema::create('Sections', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('Name_section', 100);
			$table->bigInteger('Grade_id')->unsigned();
			$table->bigInteger('Class_id')->unsigned();
			$table->integer('Status');
		});
	}

	public function down()
	{
		Schema::drop('Sections');
	}
}
