<?php

use App\Models\Course;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Course::class)->constrained()->onDelete('cascade');
            $table->integer('duration')->default(3600 * 24 * 7 * 10); // duration in seconds
            $table->integer('max_student')->default(1000);
            $table->integer('student_enrolled')->default(0);
            $table->integer('retake_course')->default(0);
            $table->string('duration_info')->default('50 hours');
            $table->string('skill_level')->default('All levels');
            $table->string('language')->default('English');
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
        Schema::dropIfExists('course_details');
    }
}
