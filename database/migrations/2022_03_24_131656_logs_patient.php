<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogsPatient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs_patient', function (Blueprint $table) {
            $table->bigIncrements('logs_patient_id');
            $table->foreignId('patient_id');
            $table->string('activity');
            $table->text('logs_detail')->nullable();
            $table->string('logs_status',50);
            $table->timestamp('active_date')->useCurrent();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs_patients');
        
    }
}
