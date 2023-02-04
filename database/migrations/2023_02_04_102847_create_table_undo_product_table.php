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
        Schema::create('undoproduct', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product_name');
            $table->string('product_image');
            $table->string('product_type_id');
            $table->string('calculation_id');
            $table->string('admin_id');
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
        Schema::dropIfExists('undoproduct');
    }
};
