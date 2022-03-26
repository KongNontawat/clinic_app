<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PatientMedicalInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_medical_info', function (Blueprint $table) {
            $table->bigIncrements('patient_medical_info_id');
            $table->foreignId('patient_id');
            $table->integer('height', false, true)->length(3)->nullable();
            $table->integer('weight', false, true)->length(3)->nullable();
            $table->string('blood_group',5)->nullable();
            $table->text('drug_allergies')->nullable();
            $table->text('food_allergies')->nullable();
            $table->integer('smoker', false, true)->length(1)->nullable();
            $table->integer('drinks', false, true)->length(1)->nullable();
            $table->text('congenital_disease')->nullable();
            $table->boolean('diabetic')->nullable();
            $table->boolean('high_blood_pressure')->nullable();
            $table->boolean('bleed_tendency')->nullable();
            $table->boolean('heart_disease')->nullable();
            $table->boolean('female_pregnant')->nullable();
            $table->string('first_register_chanel',50)->nullable();
            $table->text('surgery')->nullable();
            $table->text('accident')->nullable();
            $table->text('high_risk_diseases')->nullable();
            $table->text('medical_history')->nullable();
            $table->text('current_medication')->nullable();
            $table->longText('note')->nullable();
            $table->foreignId('inquirer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_medical_info');
    }
}
