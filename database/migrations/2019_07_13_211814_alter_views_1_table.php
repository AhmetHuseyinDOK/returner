<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterViews1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('views', function(Blueprint $table)
        {
            $table->integer('customer_id')->unsigned()->nullable()->index();
            $table->dropColumn('user_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('views', function(Blueprint $table)
        {
            $table->dropColumn('customer_id');
            $table->integer('user_id')->unsigned()->nullable()->index();

        });
    }
}
