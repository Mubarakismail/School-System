<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{

    public function up()
    {
        Schema::table('Classrooms', function (Blueprint $table) {
            $table->foreign('Grade_id')->references('id')->on('Grades')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('Sections', function (Blueprint $table) {
            $table->foreign('Grade_id')->references('id')->on('Grades')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('Sections', function (Blueprint $table) {
            $table->foreign('Class_id')->references('id')->on('Classrooms')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('my_parents', function (Blueprint $table) {
            $table->foreign('Nationality_Father_id')->references('id')->on('nationalites')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('Blood_Type_Father_id')->references('id')->on('bloods')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('Religion_Father_id')->references('id')->on('religines')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('Nationality_Mother_id')->references('id')->on('nationalites')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('Blood_Type_Mother_id')->references('id')->on('bloods')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('Religion_Mother_id')->references('id')->on('religines')->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('parent_attachments', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('my_parents')->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('students', function (Blueprint $table) {
            // foriegn keys
            $table->foreign('Nationality_id')->references('id')->on('nationalites')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Grade_id')->references('id')->on('Grades')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Classroom_id')->references('id')->on('Classrooms')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Section_id')->references('id')->on('Sections')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Parent_id')->references('id')->on('my_parents')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Blood_type_id')->references('id')->on('bloods')
                ->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('promotion_students', function (Blueprint $table) {
            // foriegn keys
            $table->foreign('student_id')->references('id')->on('students')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('from_grade')->references('id')->on('Grades')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('from_classroom')->references('id')->on('Classrooms')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('from_section')->references('id')->on('Sections')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('to_grade')->references('id')->on('Grades')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('to_classroom')->references('id')->on('Classrooms')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('to_section')->references('id')->on('Sections')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::table('Classrooms', function (Blueprint $table) {
            $table->dropForeign('Classrooms_Grade_id_foreign');
        });
        Schema::table('Sections', function (Blueprint $table) {
            $table->dropForeign('Sections_Grade_id_foreign');
        });
        Schema::table('Sections', function (Blueprint $table) {
            $table->dropForeign('Sections_Class_id_foreign');
        });
    }
}
