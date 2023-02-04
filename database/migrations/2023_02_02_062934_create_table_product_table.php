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
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product_name');
            $table->string('product_image');
            $table->unsignedBigInteger('product_type_id');
            $table->foreign('product_type_id')->references('product_type_id')->on('product_types')->onDelete('cascade');
            $table->unsignedBigInteger('calculation_id');
            $table->foreign('calculation_id')->references('calculation_id')->on('calculations')->onDelete('cascade');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('admin_id')->on('admin')->onDelete('cascade');
            $table->string('import_price');
            $table->string('retail_price');
            $table->string('wholesale_price');
            $table->string('status');
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
        Schema::dropIfExists('product');
    }
};
