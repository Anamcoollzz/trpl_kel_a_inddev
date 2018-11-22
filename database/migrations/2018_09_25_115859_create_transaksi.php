<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no',100);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('rekening_admin')->unsigned()->nullable();
            $table->foreign('rekening_admin')->references('id')->on('rekening')->onUpdate('set null')->onDelete('set null');
            $table->string('lunas',50)->default('belum');
            $table->string('nama_pengirim')->nullable();
            $table->string('norek_pengirim')->nullable();
            $table->string('tanggal_transfer')->nullable();
            $table->string('bukti_transfer')->nullable();
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
        Schema::dropIfExists('transaksi');
    }
}
