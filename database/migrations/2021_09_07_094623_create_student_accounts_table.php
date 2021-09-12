<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Grade_id')->references('id')->on('Grades')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Classroom_id')->references('id')->on('Classrooms')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Student_id')->references('id')->on('Students')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('Debit', 8, 2)->nullable();
            $table->decimal('Credit', 8, 2)->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('student_accounts');
    }
}
