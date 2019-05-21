<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenerateUser::class);
        $this->call(KategoriSeeder::class);
        $this->call(GeneratePengaturan::class);
        $this->call(CreateUserDummy::class);
        $this->call(CreateProdukDummy::class);
    }
}
