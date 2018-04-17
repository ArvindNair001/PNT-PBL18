<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentSkills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('skills_id');
            $table->unsignedInteger('user_id');
            $table->string('branch');
            $table->timestamps();
        });

        Schema::table('student_skills',function ($table){
            $table->foreign('skills_id')->references('id')->on('skills');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_skills', function($table){
            $table->dropForeign('student_skills_skills_id_foreign');
            $table->dropForeign('student_skills_user_id_foreign');
        });
    }
}
