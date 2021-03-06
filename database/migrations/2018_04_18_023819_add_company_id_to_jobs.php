<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyIdToJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function($table){
            $table->integer('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function($table){
            $table->dropForeign('jobs_company_id_foreign');
            $table->dropColumn('company_id');
        });
    }
}
