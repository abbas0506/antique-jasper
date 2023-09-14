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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tracking_id');
            $table->string('customer_name');
            $table->string('shipping_address');
            $table->string('city')->nullable();
            $table->string('phone', 20);
            $table->string('receipt', 50)->nullable();
            $table->boolean('receipt_accepted')->nullable(); //receipt accepted
            $table->string('receipt_note', 100)->nullable();
            $table->timestamp('shipped_at')->nullable();
            $table->string('shipment_note')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
