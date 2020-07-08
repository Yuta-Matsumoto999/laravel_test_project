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
            $table->increments('id');
            $table->integer('tag_category_id')->unsigned();
            $table->string('name', 45);
            $table->integer('price');
            $table->text('content', 1000);
            $table->string('model');
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('tag_category_id')->references('id')->on('tag_categories');
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
