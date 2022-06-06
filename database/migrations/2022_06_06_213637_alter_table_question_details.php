<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableQuestionDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question_details', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
            $table->text('explanation')->nullable()->change();
            $table->text('hint')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question_details', function (Blueprint $table) {
            $table->string('description')->nullable()->change();
            $table->string('explanation')->nullable()->change();
            $table->string('hint')->nullable()->change();
        });
    }
}
