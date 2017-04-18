<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * Get the Power for the Teacher.
	 */
	public function Power()
	{
		return $this->belongsTo('App\Power', 'group', 'id');
	}
}
