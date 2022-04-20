<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryMedicineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_category', function (Blueprint $table) {
            $table->bigIncrements('medicine_category_id');
            $table->string('medicine_category_name');
            $table->text('medicine_category_detail')->nullable();
            $table->integer('medicine_category_status', false, true)->length(1)->default(1);
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
        Schema::dropIfExists('category_medicine');
    }
}
