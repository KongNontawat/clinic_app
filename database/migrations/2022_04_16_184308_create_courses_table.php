<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('course_id');
            $table->foreignId('course_category_id');
            $table->string('course_name');
            $table->float('course_doctor_price',11,2)->default(0);
            $table->float('course_assistant_price',11,2)->default(0);
            $table->float('course_course_price',11,2)->default(0);
            $table->float('course_total_price',11,2)->default(0);
            $table->string('course_type',50)->nullable();
            $table->integer('course_number_of_time', false, true)->length(3)->default(0);
            $table->text('course_detail')->nullable();
            $table->integer('course_status', false, true)->length(1)->default(1);
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
        Schema::dropIfExists('courses');
    }
}
