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
        Schema::create('subsubmodels', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_id');
            $table->integer('sub_id');
            $table->string('sub_eng');
            $table->string('sub_urdu');
            $table->string('slug_eng');
            $table->string('slug_urdu');
            $table->string('image');
            
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
        Schema::dropIfExists('subsubmodels');
    }
};
