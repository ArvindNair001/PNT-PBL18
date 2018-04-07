<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
            $table->float('sem_1',8,2);
            $table->float('sem_2',8,2);
            $table->float('sem_3',8,2);
            $table->float('sem_4',8,2)->nullable();
            $table->float('sem_5',8,2)->nullable();
            $table->float('sem_6',8,2)->nullable();
            $table->float('sem_7',8,2)->nullable();
            $table->float('marks_12',8,2)->nullable();
            $table->float('marks_11',8,2)->nullable();
            $table->float('avg_CGPI',8,2);            
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
        Schema::dropIfExists('marks');
    }
}
