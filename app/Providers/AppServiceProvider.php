<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use Route;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Route::resourceVerbs([
            'edit'=>'ubah',
            'create'=>'tambah',
        ]);
        if (Schema::hasTable('kategori')) {
            View::share('_kategori', \App\Kategori::all());
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
