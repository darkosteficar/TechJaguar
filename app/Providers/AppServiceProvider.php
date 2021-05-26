<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\Manufacturer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Carbon::setLocale('hr'); // <---
        $allCats = Category::all();
        $allManus = Manufacturer::all();
        View::share('allCats', $allCats);
        View::share('allManus', $allManus);
    }
}
