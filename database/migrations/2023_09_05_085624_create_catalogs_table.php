<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->string("product_name");
            $table->integer("stock");
            $table->double("unit_price");
            $table->string("image")->nullable();
            $table->longText("description")->nullable();
            $table->string("status");
            
            $table->unsignedBigInteger("catalog_category_id")->nullable();
            $table->foreign('catalog_category_id')->references('id')->on('catalog_categories')->onDelete(NULL);

            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogs');
    }
}
