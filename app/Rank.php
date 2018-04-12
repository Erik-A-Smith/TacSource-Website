<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rank extends Model
{
  protected $table = 'ranks';
  use SoftDeletes;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
     'name', 'rank', 'points', "color"
  ];

  public function User()
  {
      return $this->hasOne('App\User',"rank");
  }

  public function hasNext()
  {
    $nextLevel= $this->rank + 1;
    $next = Rank::where("rank",$nextLevel)->first();
    if($next){
      return true;
    } else{
      return false;
    }
  }

  public function next()
  {
    if($this->hasNext()){
      $nextLevel= $this->rank + 1;
      return Rank::where("rank",$nextLevel)->first();
    } else{
      return false;
    }
  }
}
