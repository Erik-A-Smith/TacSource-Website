<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
  protected $table = 'statuses';
  use SoftDeletes;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
     'id', 'name'
  ];

  static public function Pending(){
    return Status::where("name","Pending")->first();
  }

  static public function Revoked(){
    return Status::where("name","Revoked")->first();
  }

  static public function Approved(){
    return Status::where("name","Approved")->first();
  }

}
