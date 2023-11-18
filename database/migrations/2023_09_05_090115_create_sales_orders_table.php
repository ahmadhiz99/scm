<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->id();
            $table->string("no_sale_invoice");
            $table->date("invoice_date");
            $table->date("due_date")->nullable();
            $table->string("customer_name");
            $table->longText("shipping_address");
            $table->double("grand_total");
            
            $table->unsignedBigInteger("courier_id");
            $table->foreign('courier_id')->references('id')->on('couriers')->onDelete(NULL);

            $table->string("status");

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
        Schema::dropIfExists('sales_orders');
    }
}
