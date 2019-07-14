<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterCustomers1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function(Blueprint $table)
        {
            $table->string('os_app_id')->unsigned()->nullable()->index();
            $table->string('os_api_key')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function(Blueprint $table)
        {
            $table->dropColumn('os_app_id');
            $table->dropColumn('os_api_key');

        });
    }
}
