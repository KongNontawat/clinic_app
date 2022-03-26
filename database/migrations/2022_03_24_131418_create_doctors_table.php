<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('doctor_id');
            $table->foreignId('user_id');
            $table->string('title',10)->nullable();
            $table->string('fname',100);
            $table->string('lname',255);
            $table->string('nname',50)->nullable();
            $table->string('sex',6);
            $table->string('birthdate',100);
            $table->integer('age', false, true)->length(3);
            $table->string('email',255);
            $table->string('id_line',100)->nullable();
            $table->string('phone',30);
            $table->foreignId('address_id');
            $table->string('position',255)->nullable();
            $table->string('specialize',255)->nullable();
            $table->string('in_hospital',255)->nullable();
            $table->text('aboutme')->nullable();
            $table->string('image')->nullable();
            $table->integer('doctor_status', false, true)->length(1)->default(1);
            $table->timestamps();

            // $table->foreign('address_id')->references('address_id')->on('address_info')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
