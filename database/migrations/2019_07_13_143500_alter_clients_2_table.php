<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterClients2Table extends Migration
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
            $table->string('api_customer_url')->nullable();
            $table->string('api_coupon_url')->nullable();
            $table->dropColumn('url_customer');
            $table->dropColumn('url_coupon');
            $table->dropColumn('url_basket');

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
            $table->dropColumn('api_customer_url');
            $table->dropColumn('api_coupon_url');
            $table->string('url_customer')->nullable();
            $table->string('url_coupon')->nullable();
            $table->string('url_basket')->nullable();

        });
    }
}
