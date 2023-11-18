<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionItemMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_item_materials', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("production_item_id");
            $table->foreign('production_item_id')->references('id')->on('production_items')->onDelete('cascade');

            $table->unsignedBigInteger("material_id");
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');

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
        Schema::dropIfExists('production_item_materials');
    }
}
