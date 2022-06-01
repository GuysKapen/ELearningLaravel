<?php

use App\Models\QuestionOption;
use App\Models\QuizQuestion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_answers', function (Blueprint $table) {
            $table->foreignIdFor(QuizQuestion::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(QuestionOption::class)->constrained()->onDelete('cascade');
            $table->primary(['quiz_question_id', 'question_option_id']);
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
        Schema::dropIfExists('question_answers');
    }
}
