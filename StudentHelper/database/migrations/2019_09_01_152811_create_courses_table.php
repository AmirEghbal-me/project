<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->bigInteger('course_code')->primary();
            $table->string('name');
            $table->enum('unit', ['1', '2','3']);
            $table->enum('type', ['تخصصی', 'عمومی','پایه']);
            $table->enum('presentation_type', ['تئوری', 'عملی']);
            $table->enum('field', ['کامپیوتر', 'عمران','برق','معماری','حسابداری']);
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
        Schema::dropIfExists('course');
    }
}
