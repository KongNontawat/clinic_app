<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('appointment_id');
            $table->foreignId('doctor_id');
            $table->foreignId('patient_id');
            $table->string('appointment_number',20)->unique();
            // $table->foreignId('appointment_type',20)->unique();
            $table->text('reason_for_appointment');
            $table->text('doctor_comment')->nullable();
            $table->string('appointment_date',50);
            $table->string('appointment_time',20);
            $table->integer('appointment_status', false, true)->length(1)->default(0);
            $table->timestamp('created_at')->useCurrent();

            // $table->foreign('doctor_id')->references('doctor_id')->on('doctors')->onDelete('cascade');
            // $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
