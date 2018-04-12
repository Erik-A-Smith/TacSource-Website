<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
  protected $table = 'roles';
  use SoftDeletes;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
     'name', 'points'
  ];

  static public function default(){
    return Role::where("name", "Rifleman")->first();
  }
}
