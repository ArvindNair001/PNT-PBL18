<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementsSkills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirement_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('skills_id');
            $table->unsignedInteger('jobs_id');
            $table->string('branch');
            $table->timestamps();
        });

        Schema::table('requirement_skills',function ( $table){
            $table->foreign('skills_id')->references('id')->on('skills')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('jobs_id')->references('id')->on('jobs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirement_skills', function($table){
            $table->dropForeign('requirement_skills_skills_id_foreign');
            $table->dropForeign('requirement_skills_jobs_id_foreign');
            
        });                
    }
}
