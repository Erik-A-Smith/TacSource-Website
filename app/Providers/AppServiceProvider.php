<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('officerAlerts', $this->countOfficerAlerts());
        View::share('awaitingPromotions', $this->countAwaitingPromotion());
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

    public function countOfficerAlerts()
    {
      // get all promotions
      $all = 0;
      $all += $this->countAwaitingPromotion();

       return $all;
    }


    public function countAwaitingPromotion()
    {
      // get all promotions
       $all = User::all()->reject(function ($user) {
            if(!$user->isPromotable()){
                return $user;
            }
        });

       return count($all);
    }
}
