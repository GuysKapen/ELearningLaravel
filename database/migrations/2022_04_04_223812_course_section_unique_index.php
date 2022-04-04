<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CourseSectionUniqueIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_sections', function(Blueprint $table)
        {
            $table->dropUnique('course_sections_slug_unique');
            $table->unique(['slug', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_sections', function(Blueprint $table)
        {
            $table->unique(['slug']);
            $table->dropUnique('course_sections_slug_course_id_unique');
        });
    }
}
