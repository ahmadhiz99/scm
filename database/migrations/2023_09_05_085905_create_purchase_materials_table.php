<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_materials', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("material_id");
            $table->foreign('material_id')->references('id')->on('materials')->onDelete(NULL);

            $table->integer("quantity");
            $table->string("unit");
            $table->double("unit_price");
            $table->longText("note")->nullable();

            $table->unsignedBigInteger("purchase_order_id");
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders')->onDelete('cascade');

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
        Schema::dropIfExists('purchase_materials');
    }
}
