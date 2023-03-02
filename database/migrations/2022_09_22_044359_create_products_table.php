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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('added_by', 191)->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('product_name_en', 80)->nullable();
            $table->string('product_slug_en', 120)->nullable();
            $table->string('product_name_ar', 80)->nullable();
            $table->string('product_slug_ar', 120)->nullable();
            $table->string('category_ids', 80)->nullable();
            $table->bigInteger('brand_id')->nullable();
            $table->string('unit', 191)->nullable();
            $table->integer('min_qty')->default(1);
            $table->tinyInteger('refundable')->default(1);
            $table->string('images')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('featured')->nullable();
            $table->string('flash_deal', 20)->nullable();
            $table->string('video_provider', 30)->nullable();
            $table->string('video_url',150)->nullable();
            $table->string('colors', 150)->nullable();
            $table->tinyInteger('variant_product')->default(0);
            $table->string('attributes')->nullable();
            $table->text('choice_options')->nullable();
            $table->text('variation')->nullable();
            $table->tinyInteger('published')->default(0);
            $table->double('unit_price')->default(0);
            $table->double('purchase_price')->default(0);
            $table->string('tax', 191)->default(0.00);
            $table->string('tax_type',80)->nullable();
            $table->string('discount', 191)->default(0.00);
            $table->string('discount_type', 80)->nullable();
            $table->integer('current_stock')->nullable();
            $table->text('details')->nullable();
            $table->tinyInteger('free_shipping')->default(0);
            $table->string('attachment', 191)->nullable();
            $table->timestamps();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('featured_status')->default(1);
            $table->string('meta_title',191)->nullable();
            $table->string('meta_description',191)->nullable();
            $table->string('meta_image',191)->nullable();
            $table->tinyInteger('request_status')->default(0);
            $table->string('denied_note',191)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
