<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PatientEmc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_emc', function (Blueprint $table) {
            $table->bigIncrements('patient_emc_id');
            $table->foreignId('patient_id');
            $table->string('emc_relation',30)->nullable();
            $table->string('emc_title',10)->nullable();
            $table->string('emc_fname',100)->nullable();
            $table->string('emc_lname',255)->nullable();
            $table->foreignId('emc_address_id')->nullable();
            $table->string('emc_phone',30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_emc');
        
    }
}
