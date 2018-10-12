<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('no_hp')->nullable();
            $table->text('alamat')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('member');
            $table->string('avatar')->nullable();
            $table->enum('status',[
                'verified','pending','blocked',
            ])->default('pending');
            $table->enum('tahap_1',[
                'belum','sudah',
            ]);
            $table->enum('tahap_2',[
                'belum','sudah',
            ]);
            $table->enum('tahap_3',[
                'belum','sudah',
            ]);
            $table->enum('tingkat_member',[
                'member','cv',
            ]);
            $table->enum('jenis_kelamin',[
                'Perempuan','Laki-laki',
            ]);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
