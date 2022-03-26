<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddressInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_info', function (Blueprint $table) {
            $table->bigIncrements('address_id');
            $table->text('address')->nullable();
            $table->foreignId('subdistrict_id')->nullable();
            $table->foreignId('district_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->string('zip_code',10)->nullable();
            $table->string('country',40)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_info');
        
    }
}
