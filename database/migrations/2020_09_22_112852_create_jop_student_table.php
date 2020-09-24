<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJopStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jop_student', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')->constrained();
            $table->foreignId('jop_id')->constrained();
            $table->boolean('status')->default(0);
            $table->foreignId('resume_id')->constrained();
            $table->boolean('block')->default(0);

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
        Schema::dropIfExists('jop_student');
    }
}
