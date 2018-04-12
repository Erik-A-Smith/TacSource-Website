<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
  	protected $table = 'attendances';
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'attendee', "event_id", "status", "role"
    ];

    public function User(){
      return $this->belongsTo("App\User", "attendee");
    }

    public function Event(){
      return $this->belongsTo("App\Event");
    }

    public function Role(){
      return $this->belongsTo("App\Role","role");
    }

    public function Status(){
      return $this->belongsTo("App\Status","status");
    }

    public function Approved(){
      $approvedStatus = Status::where("name","Approved")->first();
      if($this->Status == $approvedStatus){
        return true;
      } else{
        return false;
      }
    }

    // Save override
    public static function create(array $attributes = [])
    {
        if($attributes["role"] == null){
          $attributes["role"] = Role::default()->id;
        }

        //Parent Save
        $model = static::query()->create($attributes);
        return $model;
    }
}
