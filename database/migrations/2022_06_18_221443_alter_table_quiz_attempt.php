<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableQuizAttempt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quiz_attempts', function (Blueprint $table) {
            $table->dropPrimary('quiz_attempts_pkey');
        });

        // Need to separate to work (commit transaction)
        Schema::table('quiz_attempts', function (Blueprint $table) {
            $table->id();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quiz_attempts', function (Blueprint $table) {
            $table->dropPrimary();
            $table->dropColumn('id');
            $table->primary(["user_id", "course_quiz_id"]);
        });
    }
}
