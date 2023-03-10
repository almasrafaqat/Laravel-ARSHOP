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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name_en');
            $table->string('category_slug_en');
            $table->string('category_name_ar')->nullable();
            $table->string('category_slug_ar')->nullable();
            $table->string('category_icon')->nullable();
            $table->integer('parent_id');
            $table->integer('position');
            $table->timestamps();
            $table->tinyInteger('home_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
