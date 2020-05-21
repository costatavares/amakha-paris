<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('box_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idProduct')->unsigned(false)->index();
            $table->integer('idBox')->unsigned(false)->index();
            $table->integer('howMuchFit');
            $table->timestamps();
            $table->foreign('idProduct')->references('idProduct')->on('products')->onDelete('cascade');
            $table->foreign('idBox')->references('idBox')->on('boxes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('box_products');
    }
}
