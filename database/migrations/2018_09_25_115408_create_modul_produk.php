<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modul_produk', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_produk')->unsigned();
            $table->foreign('id_produk')->references('id')->on('produk')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modul_produk');
    }
}
