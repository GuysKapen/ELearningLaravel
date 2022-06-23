<?php

use App\Models\QuestionOption;
use App\Models\QuizAttempt;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerAttemptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_attempt', function (Blueprint $table) {
            $table->foreignIdFor(QuizAttempt::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(QuestionOption::class)->constrained()->onDelete('cascade');
            $table->primary(['quiz_attempt_id', 'question_option_id']);
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
        Schema::dropIfExists('answer_attempt');
    }
}
