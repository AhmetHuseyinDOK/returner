<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_codes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('customer_id')->unsigned()->nullable()->index();
            $table->string('code')->nullable();
            $table->string('expires')->nullable();
            $table->integer('product_id')->unsigned()->nullable()->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coupon_codes');
    }
}
