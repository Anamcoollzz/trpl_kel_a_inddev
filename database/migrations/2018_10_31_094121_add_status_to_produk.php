<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->string('status',50)->default('pending');
            $table->string('file_path');
            $table->string('panduan_path');
            $table->string('bundling_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('file_path');
            $table->dropColumn('panduan_path');
            $table->dropColumn('bundling_path');
        });
    }
}
