<?php

namespace App\Providers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view)
        {
            if (Auth::check()) {
                if(Auth::user()->isOrtu()){
                    $anak = Siswa::where('id_user', Auth::id())->get();
                    $view->with('anak', $anak);
                }
            }
        });
        
    }
}
