<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;
use Carbon\Carbon;

class EventType extends Model
{
  protected $table = 'event_types';
  use SoftDeletes;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
     'id', 'name', 'points'
  ];

}
