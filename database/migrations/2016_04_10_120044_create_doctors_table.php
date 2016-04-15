<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->char('phone_number','25');
            $table->bigInteger('doctor_id')->length(25)->unsigned();
            $table->string('education',200);
            $table->string('speciality',255);
            $table->string('experience',200);
            $table->string('designation',20);
            $table->integer('category_id',20);
            $table->time('time_range');
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
        Schema::drop('doctors');
    }
}
