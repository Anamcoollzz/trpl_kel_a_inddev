<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->text('isi');
            $table->string('sudah_dibaca')->default('tidak');
            $table->integer('id_chat')->unsigned();
            $table->foreign('id_chat')->references('id')->on('chat')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('chat_detail');
    }
}
