<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->integer('category_id');
            $table->integer('section_id');
            $table->integer('brand_id');
            $table->string('product_name');
            $table->string('product_color');
            $table->string('product_code');
            $table->float('product_price');
            $table->float('product_discount');
            $table->integer('stock');
            $table->string('slug');
            $table->string('main_image');
            $table->text('description');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->enum('is_fetured',['No','Yes']);
            $table->enum('status',['active','inactive'])->default('inactive');
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
        Schema::dropIfExists('products');
    }
}
