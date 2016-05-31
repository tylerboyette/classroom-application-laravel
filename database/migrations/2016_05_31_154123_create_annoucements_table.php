<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnoucementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annoucements', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->text('message');

            $table->integer('course_id')->unsigned();

            $table->timestamps();
        });

        // Foreign Key Constraint
        Schema::table('annoucements', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('annoucements');
    }
}
