<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoupon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_name');
            $table->string('desc');
            $table->string('max_uses');
            $table->string('max_uses_users');
            $table->string('type');
            $table->string('discount_ammount');
            $table->string('min_ammount');
            $table->string('status');
            $table->string('starts_at');
            $table->string('expires_at');
            $table->string('code');
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
        Schema::dropIfExists('coupon');
    }
}