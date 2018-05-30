<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\User;
use View;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        View::share('officerAlerts', $this->countOfficerAlerts());
        View::share('awaitingPromotions', $this->countAwaitingPromotion());
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
