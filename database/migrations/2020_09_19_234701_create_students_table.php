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

      $table->string('name' , 100);
      $table->string('condition' , 100)->default('unemployeed');
      $table->string('title' , 100);
      $table->string('location' , 100);
      $table->string('city' , 100);
      $table->string('coverLetter' , 100);
      $table->string('approved' , 100)->default('unapproved');
      $table->boolean('block')->default(0);
      $table->string('img' , 64)->nullable();
      $table->string('varified' , 100)->default('unvarified');
      $table->foreignId('user_id')->constrained();


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
