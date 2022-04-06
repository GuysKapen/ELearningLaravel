<?php

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseCoAuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_co_author', function (Blueprint $table) {
            $table->foreignIdFor(Course::class)->nullable(false)->constrained()->onDelete('cascade');
            $table->foreignIdFor(User::class);
            $table->primary(["user_id", "course_id"]);
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
        Schema::dropIfExists('course_co_author');
    }
}
