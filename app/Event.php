<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;
use Carbon\Carbon;

class Event extends Model
{
  protected $table = 'events';
  use SoftDeletes;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
     'name', 'date', 'time', 'zone', 'mods', 'description', 'owner', "type", "status"
  ];

  public function Owner()
  {
      return $this->belongsTo('App\User',"owner");
  }
  public function Status()
  {
      return $this->belongsTo('App\Status',"status");
  }
  public function Attendances()
  {
     return $this->hasMany('App\Attendance');
  }

  public function Attendance(User $user)
  {
     return $this->hasMany('App\Attendance')
       ->where("attendee", $user->id)->first();
  }

  public function Type()
  {
     return $this->belongsTo('App\EventType',"type");
  }

  public function Attending(User $user)
  {
    $attendance = $this->hasMany('App\Attendance')
      ->where("attendee", $user->id)->get();
    return count($attendance) > 0;
  }

  // Save override
  public static function create(array $attributes = [])
  {
      if($attributes["mods"][0] != null){
        $name = Carbon::now() . "-" . str_random(60) . $attributes["mods"][0]->getClientOriginalName();
        $name = str_replace(' ', '_', $name);
        $name = str_replace(':', '', $name);
        $path = $attributes["mods"][0]->storeAs("mods/", $name);
        $attributes["mods"] = $name;
      }

      //Parent Save
      $model = static::query()->create($attributes);
      return $model;
  }

  public function storeMod($event, $modfile){

    if($modfile == null){
      return $event->mods;
    }

    //Delete old mod file
    if($event->mods != null){
      Storage::delete('mods/'.$event->mods);
    }

    if($modfile[0] != null){
      $name = Carbon::now() . "-" . str_random(60) . $modfile[0]->getClientOriginalName();
      $name = str_replace(' ', '_', $name);
      $name = str_replace(':', '', $name);
      $path = $modfile[0]->storeAs("mods/", $name);
      return $name;
    }
  }

  public function delete() {

    //Delete associated attendances
    foreach ($this->Attendances as $key => $attendance) {
      $attendance->delete();
    }

    //Delete old mod file
    if($this->mods != null){
      Storage::delete('mods/'.$this->mods);
    }
    parent::delete();
  }

  static public function Approved() {
    return Event::where("status", Status::Approved()->id);
  }

  static public function Pending() {
    return Event::where("status", Status::Pending()->id);
  }

  static public function Revoked() {
    return Event::where("status", Status::Revoked()->id);
  }

}
