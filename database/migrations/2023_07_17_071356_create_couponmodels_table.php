<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couponmodels', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_name');
            $table->integer('copon_discount');
            $table->string('coupon_validity');
            $table->integer('coupon_status')->default(1);
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
        Schema::dropIfExists('couponmodels');
    }
};
