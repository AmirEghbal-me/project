<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermPresentedCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_presented_courses', function (Blueprint $table) {
            $table->integer('term_course_id')->primary();
            $table->integer('university_course_id');
            $table->smallInteger('term_number');
            $table->integer('teacher_id');
            $table->smallInteger('session1_time');
            $table->smallInteger('session2_time')->nullable();
            $table->enum('session2_type', ['ثابت', 'هفته زوج', 'هفته فرد','ندارد']);
            $table->integer('course_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('term_presented_courses');
    }
}
