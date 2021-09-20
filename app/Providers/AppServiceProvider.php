<?php

namespace App\Providers;

use App\Models\Category;
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
        View::composer('front.partials.app', function ($view) {
            $view->with('data', [
                'categories' => Category::where(['status' => true,'parent_id' => null])
                    ->with('subcat')
                    ->orderBy('sort', 'ASC')
                    ->get()
            ]);
        });
    }
}
