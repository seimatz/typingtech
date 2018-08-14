<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUkrainiannewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ukrainiannews', function (Blueprint $table) {
          $table->increments('id');
          $table->string('question');
          $table->dateTime('date');
          $table->integer('level');
          $table->string('en');
          $table->string('jp');
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
        Schema::dropIfExists('ukrainiannews');
    }
}
