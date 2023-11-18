<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_items', function (Blueprint $table) {
            $table->id();
            $table->string("item_name");
            $table->integer("quantity");
            $table->double("unit_price");
            $table->string("image")->nullable();
            $table->longText("description")->nullable();
            
            $table->unsignedBigInteger("catalog_category_id")->nullable();
            $table->foreign('catalog_category_id')->references('id')->on('catalog_categories')->onDelete(NULL);
            
            $table->unsignedBigInteger("catalog_id")->nullable();
            $table->foreign('catalog_id')->references('id')->on('catalogs')->onDelete(NULL);

            $table->unsignedBigInteger("production_order_id");
            $table->foreign('production_order_id')->references('id')->on('production_orders')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production_items');
    }
}
