<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Email');
            $table->string('Password');
            $table->string('Gender');
            $table->date('Birthday_Date');
            $table->string('Acadimic_year');
            $table->bigInteger('Nationality_id')->unsigned();
            $table->bigInteger('Grade_id')->unsigned();
            $table->bigInteger('Classroom_id')->unsigned();
            $table->bigInteger('Section_id')->unsigned();
            $table->bigInteger('Parent_id')->unsigned();
            $table->bigInteger('Blood_type_id')->unsigned();
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
}
