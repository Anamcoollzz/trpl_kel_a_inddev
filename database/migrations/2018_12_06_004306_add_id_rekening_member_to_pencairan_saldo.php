<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdRekeningMemberToPencairanSaldo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pencairan_saldo', function (Blueprint $table) {
            $table->integer('id_rekening_member')->unsigned();
            $table->foreign('id_rekening_member')->references('id')->on('rekening_member')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pencairan_saldo', function (Blueprint $table) {
            $table->dropForeign(['id_rekening_member']);
        });
        Schema::table('pencairan_saldo', function (Blueprint $table) {
            $table->dropColumn('id_rekening_member');
        });
    }
}
