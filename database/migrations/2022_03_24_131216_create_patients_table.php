<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('patient_id');
            $table->string('opd_id',20)->unique();
            $table->string('id_card',17);
            $table->foreignId('group_id');
            $table->string('title',10)->nullable();
            $table->string('fname',100);
            $table->string('lname',255);
            $table->string('nname',50)->nullable();
            $table->string('sex',6);
            $table->string('birthdate',100);
            $table->integer('age', false, true)->length(3);
            $table->string('nationality',50);
            $table->string('race',50);
            $table->string('religion',50);
            $table->string('email',255)->nullable();
            $table->string('id_line',100)->nullable();
            $table->string('phone',30);
            $table->foreignId('address_id');
            $table->string('occupation',50)->nullable();
            $table->string('image',255)->nullable();
            $table->integer('patient_status', false, true)->length(1)->default(1);
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
        Schema::dropIfExists('patients');
    }
}
