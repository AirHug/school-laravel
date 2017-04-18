<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseLog extends Model
{

    /**
     * The course that belong to the courseLog.
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    /**
     * The course that belong to the courseLog.
     */
    public function Student()
    {
        return $this->belongsTo('App\Student');
    }
}
