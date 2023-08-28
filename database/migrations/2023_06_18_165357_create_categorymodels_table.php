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
        Schema::create('categorymodels', function (Blueprint $table) {
            $table->id();
            $table->string('catnam_eng');
            $table->string('catname_urdu');
            $table->string('slug_eng');
            $table->string('slug_urdu');
            $table->string('cat_icon');

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
        Schema::dropIfExists('categorymodels');
    }
};
