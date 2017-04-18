<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = "yyyy-MM-dd";

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the Class for the Student.
     */
    public function studentClass()
    {
        return $this->belongsTo('App\studentClass', 'class', 'id');
    }

    /**
     * Get the Courses for the Student.
     */
    public function Courses()
    {
        return $this->hasMany('App\courseLog', 'student_id', 'id');
    }
}
