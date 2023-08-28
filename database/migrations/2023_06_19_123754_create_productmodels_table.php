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
        Schema::create('productmodels', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('cat_id');
            $table->integer('sub_id');
            $table->integer('Subsub_id');
            $table->string('proname_eng');
            $table->string('proname_urdu');
            $table->string('slug_eng');
            $table->string('slug_urdu');
            $table->string('pro_code');
            $table->string('pro_qty');
            $table->string('protags_eng');
            $table->string('protags_urdu');
            $table->string('prosize_eng')->nullable();
            $table->string('prosize_urdu')->nullable();
            $table->string('procolor_eng');
            $table->string('procolor_urdu');
            $table->string('selling_price');
            $table->string('discount_price');
            $table->string('shortdesc_eng');
            $table->string('shortdesc_urdu');
            $table->string('longdesc_eng');
            $table->string('longdesc_urdu');
            $table->string('pro_thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deal')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('productmodels');
    }
};
