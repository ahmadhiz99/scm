<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string("no_purchase_invoice");
            $table->date("purchase_date");
            $table->date("receive_date")->nullable();
            $table->string("requester_name")->nullable();
            $table->double("grand_total");
            $table->double("payment_total")->nullable();
            $table->string("status");

            $table->unsignedBigInteger("supplier_id");
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete(NULL);

            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('purchase_orders');
    }
}
