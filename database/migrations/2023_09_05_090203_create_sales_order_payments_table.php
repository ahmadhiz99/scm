<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesOrderPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_order_payments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("sales_order_id");
            $table->foreign('sales_order_id')->references('id')->on('sales_orders')->onDelete(NULL);

            $table->string("payer_name")->nullable();
            $table->double("nominal");
            $table->string("payment_method");
            $table->date("payment_date");
            $table->string("status");

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
        Schema::dropIfExists('sales_order_payments');
    }
}
