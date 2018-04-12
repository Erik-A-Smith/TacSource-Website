<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class ResetToken extends Model
{
  protected $table = 'reset_tokens';
  use SoftDeletes;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
     'id', 'user', 'token', 'expire'
  ];

  protected $dates = [
     'created_at',
     'updated_at',
  ];

  public function User()
  {
      return $this->belongsTo('App\User',"user");
  }

  // Save override
  public static function create(array $attributes = [])
  {
      $attributes["token"] = ResetToken::generateTokken();
      $attributes["expire"] = ResetToken::generateExpiree();

      //Parent Save
      $model = static::query()->create($attributes);
      return $model;
  }

  private static function generateTokken(){
    $tokken = Carbon::now()->format('mm-dd-Y') . "_" . str_random(60);
    preg_replace('/\s+/', '_', $tokken);
    return $tokken;
  }

  private static function generateExpiree(){
    $expire = Carbon::now()->addDay();
    return $expire;
  }

  public static function findByToken($token){
    return ResetToken::where("token",$token)->first();
  }

  public function valid(){
    return !Carbon::parse($this->expire)->isPast();
  }
}
