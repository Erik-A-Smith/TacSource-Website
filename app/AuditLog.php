<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditLog extends Model
{
  protected $table = 'audit_logs';
  use SoftDeletes;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
     "owner", 'text', "created_at", "type"
  ];

  public function Owner()
  {
      return $this->belongsTo('App\User',"owner");
  }
}
