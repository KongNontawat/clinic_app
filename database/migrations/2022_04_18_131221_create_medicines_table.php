<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->bigIncrements('medicine_id');
            $table->foreignId('medicine_category_id');
            $table->string('medicine_type',20);
            $table->string('medicine_name');
            $table->float('medicine_price',11,2)->default(0);
            $table->float('medicine_stock',11,2)->default(0);
            $table->string('medicine_unit',20);
            $table->text('medicine_how_to_use')->nullable();
            $table->text('medicine_detail')->nullable();
            $table->foreignId('medicine_licensed_doctor_id');
            $table->integer('medicine_status', false, true)->length(1)->default(1);
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
        Schema::dropIfExists('medicines');
    }
}
