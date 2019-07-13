<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterClients1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function(Blueprint $table)
        {
            $table->string('url_customer')->nullable();
            $table->dropColumn('url_customer_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function(Blueprint $table)
        {
            $table->dropColumn('url_customer');
            $table->integer('url_customer_id')->unsigned()->nullable()->index();

        });
    }
}
