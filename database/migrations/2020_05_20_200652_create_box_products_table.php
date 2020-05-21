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
        Schema::create('box_products', function (Blueprint $table) {
            $table->integer('idProduct');
            $table->integer('idBox');
            $table->integer('howMuchFit');
            $table->timestamps();
            $table->index('idProduct');
            $table->index('idBox');
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
