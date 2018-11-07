<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->year('tahun_dibuat');
            $table->year('tahun_selesai_dibuat');
            $table->double('harga');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('hit')->default(0);
            $table->integer('dibeli')->default(0);
            $table->dateTime('terakhir_dilihat')->nullable();
            $table->integer('id_kategori')->unsigned()->nullable();
            $table->foreign('id_kategori')->references('id')->on('kategori')->onUpdate('set null')->onDelete('set null');
            $table->string('logo');
            $table->text('deskripsi');
            $table->text('alasan_ditolak')->nullable();
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
        Schema::dropIfExists('produk');
    }
}
