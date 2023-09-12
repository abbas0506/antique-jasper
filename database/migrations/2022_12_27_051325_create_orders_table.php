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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('city')->nullable();
            $table->string('phone', 20);
            $table->string('image', 50)->nullable();
            $table->string('courier')->nullable();
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
