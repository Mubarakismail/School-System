<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('from_grade')->unsigned();
            $table->bigInteger('from_classroom')->unsigned();
            $table->bigInteger('from_section')->unsigned();
            $table->bigInteger('to_grade')->unsigned();
            $table->bigInteger('to_classroom')->unsigned();
            $table->bigInteger('to_section')->unsigned();
            $table->bigInteger('from_academic_year')->unsigned();
            $table->bigInteger('to_academic_year')->unsigned();
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
        Schema::dropIfExists('promotion_students');
    }
}
