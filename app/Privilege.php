<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Privilege extends Model
{
	protected $table = 'privileges';
	use SoftDeletes;
	protected $fillable = [
		'id',
		'name',
	];

}
