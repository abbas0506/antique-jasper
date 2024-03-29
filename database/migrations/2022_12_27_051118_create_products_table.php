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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code', 8)->unique();
            $table->string('name', 50);
            $table->unsignedInteger('price');
            $table->unsignedInteger('color')->nullable();
            $table->string('gender')->default('M')->nullable();
            $table->boolean('is_customized')->default(false);
            $table->string('description', 200)->nullable();
            $table->string('image');
            $table->unsignedInteger('rating')->default(0);
            $table->unsignedBigInteger('subcategory_id');

            $table->foreign('subcategory_id')
                ->references('id')
                ->on('subcategories')
                ->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
};
