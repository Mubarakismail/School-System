<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_invoices', function (Blueprint $table) {
            $table->id();
            $table->date('invoice_date');
            $table->decimal('amount', 8, 2);
            $table->foreignId('Grade_id')->references('id')->on('Grades')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Classroom_id')->references('id')->on('Classrooms')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Student_id')->references('id')->on('Students')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Fee_id')->references('id')->on('Fees')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('fees_invoices');
    }
}
