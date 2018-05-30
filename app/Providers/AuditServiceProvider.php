<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\AuditLog;
use App\Event;
use URL;
use App\User;
use App\Rank;
use App\EventType;
use App\Role;
class AuditServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    Public Static function eventCreated(Event $event){
      $text = "Event has been created: <a href=\"".URL::to("/") . "/event/" . $event->id."\">".$event->name."</a>" ;

      $inputs = [
        "owner" => $event->Owner->id,
        "type" => "Event Created",
        "text" => $text
      ];
      $auditLog = AuditLog::create($inputs);
    }

    Public Static function accountCreated(User $user){
      $text = "An account has been created: <a href=\"".URL::to("/") . "/user/" . $user->id."\">".$user->username."</a>" ;

      $inputs = [
        "owner" => $user->id,
        "type" => "Account Created",
        "text" => $text
      ];
      $auditLog = AuditLog::create($inputs);
    }

    Public Static function rankChanged(User $user, $previousRank, $newRank){
      $text = "An accounts rank has been changed: <a href=\"".URL::to("/") . "/user/" . $user->id."\">".$user->username."</a> when't from <strong>" . Rank::find($previousRank)->name . "</strong> to <strong>" .Rank::find($newRank)->name ."</strong>";

      $inputs = [
        "owner" => $user->id,
        "type" => "Rank Change",
        "text" => $text
      ];
      $auditLog = AuditLog::create($inputs);
    }

    Public Static function baseRankChanged(User $user, $previousRank, $newRank){
      $text = "An accounts base rank has been changed: <a href=\"".URL::to("/") . "/user/" . $user->id."\">".$user->username."</a> when't from <strong>" . Rank::find($previousRank)->name . "</strong> to <strong>" .Rank::find($newRank)->name ."</strong>";

      $inputs = [
        "owner" => $user->id,
        "type" => "Base Rank Change",
        "text" => $text
      ];
      $auditLog = AuditLog::create($inputs);
    }

    Public Static function eventStatusChange(User $user, Event $event){
      $text = "<a href=\"".URL::to("/") . "/event/" . $event->id."\">".$event->name."</a> has been <strong>".$event->Status->name."</strong> by <a href=\"".URL::to("/") . "/user/" . $user->id."\">".$user->username."</a>";

      $inputs = [
        "owner" => $user->id,
        "type" => "Event status Change",
        "text" => $text
      ];
      $auditLog = AuditLog::create($inputs);
    }

    Public Static function rankPointChange(User $user, Rank $rank, $oldPoints, $newPoints){
      $text = "<a href=\"".URL::to("/") . "/user/" . $user->id."\">".$user->username."</a> has modified the values for the <strong>" . $rank->name . "</strong> rank from <strong>" . $oldPoints . "</strong> to <strong>" . $newPoints ."</strong>";

      $inputs = [
        "owner" => $user->id,
        "type" => "Rank Point Change",
        "text" => $text
      ];
      $auditLog = AuditLog::create($inputs);
    }

    Public Static function eventTypePointChange(User $user, EventType $eventType, $oldPoints, $newPoints){
      $text = "<a href=\"".URL::to("/") . "/user/" . $user->id."\">".$user->username."</a> has modified the values for the <strong>" . $eventType->name . "</strong> event Type from <strong>" . $oldPoints . "</strong> to <strong>" . $newPoints ."</strong>";

      $inputs = [
        "owner" => $user->id,
        "type" => "Event Type Point Change",
        "text" => $text
      ];
      $auditLog = AuditLog::create($inputs);
    }

    Public Static function rolePointChange(User $user, Role $role, $oldPoints, $newPoints){
      $text = "<a href=\"".URL::to("/") . "/user/" . $user->id."\">".$user->username."</a> has modified the values for the <strong>" . $role->name . "</strong> role from <strong>" . $oldPoints . "</strong> to <strong>" . $newPoints ."</strong>";

      $inputs = [
        "owner" => $user->id,
        "type" => "Role Point Change",
        "text" => $text
      ];
      $auditLog = AuditLog::create($inputs);
    }


}
