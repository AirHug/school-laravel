<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    /**
     * The course that belong to the teacher.
     */
    public function Teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    /**
     * The course that belong to the teacher.
     */
    public function Major()
    {
        return $this->belongsTo('App\Major', "major");
    }

    /**
     * The course that belong to the teacher.
     */
    public function studentClass()
    {
        return $this->belongsTo('App\studentClass', "class");
    }

    /**
     * The course that belong to the teacher.
     */
    public function courseLogs()
    {
        return $this->hasMany('App\courseLog');
    }
}
