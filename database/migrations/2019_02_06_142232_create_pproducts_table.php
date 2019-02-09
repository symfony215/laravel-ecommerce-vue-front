<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pproducts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name_ar');
            $table->string('product_name_en');     
            $table->string('desc_name_ar');
            $table->string('desc_name_en');
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
        Schema::dropIfExists('pproducts');
    }
}
