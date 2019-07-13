<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterCouponCodes1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coupon_codes', function(Blueprint $table)
        {
            $table->string('direct')->nullable();
            $table->string('percent')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupon_codes', function(Blueprint $table)
        {
            $table->dropColumn('direct');
            $table->dropColumn('percent');

        });
    }
}
