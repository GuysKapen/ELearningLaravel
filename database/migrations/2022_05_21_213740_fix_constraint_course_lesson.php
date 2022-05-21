<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixConstraintCourseLesson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_lessons', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->unique(array('slug', 'course_section_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_lessons', function (Blueprint $table) {
            $table->dropUnique(array('slug', 'course_section_id'));
            $table->unique(['slug']);
        });
    }
}
