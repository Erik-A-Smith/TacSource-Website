<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Status;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
      'username', 'password', 'rank', 'privilege', "base_rank"
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function Attendances(){
      return $this->hasMany("App\Attendance", "attendee");
    }

    public function BaseRank(){
      return $this->belongsTo("App\Rank", "base_rank");
    }

    public function Hosted(){
      return Event::where("owner", $this->id)->get();
    }

    public function Rank(){
      return $this->belongsTo("App\Rank", "rank");
    }

    public function Privilege(){
      return $this->belongsTo("App\Privilege","privilege");
    }

    public function isAdmin(){
      $adminPrivilege = Privilege::where("name", "Admin")->first();
      return $this->Privilege == $adminPrivilege;
    }

    public function isModerator(){
      $adminPrivilege = Privilege::where("name", "Admin")->first();
      $moderatorPrivilege = Privilege::where("name", "Moderator")->first();
      return $this->Privilege == $adminPrivilege || $this->Privilege == $moderatorPrivilege;
    }

    static public function rankingOrder(){
      // User::with('rank')->get()->sortByDesc(function ($user, $key) { return $user->Rank->rank; });
      return User::with('rank')->orderBy('rank', 'desc')->get();
    }

    public function Points(){
      $points = 0;

      // Base points
      if ($this->BaseRank) {
        $points += $this->BaseRank->points;
      }

      // Calculate attendances
      foreach ($this->Attendances as $key => $attendance) {
        if($attendance->Approved() && $attendance->Event->Status == Status::Approved()){
          $points += $attendance->Event->Type->points;
          $points += $attendance->Role->points;
        }
      }

      // Calculate attendances TODO: Implement attendances even if hosting
      foreach ($this->Hosted() as $key => $event) {
        if($event->Status == Status::Approved()){
          $points += $event->Type->points;
        }
      }

      return $points;
    }

    public function isE5(){
      $e5Rank = Rank::where("name","SGT");
      if($this->Rank->rank >= $e5Rank->rank){
        return true;
      }
      return false;
    }

    public function isPromotable(){
      if($this->Rank->hasNext()){
        if($this->Points() >= $this->Rank->next()->points){
          return true;
        }
      }
    }
}
