<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentClass extends Model
{

    /**
     * Get the Major for the Class.
     */
    public function Major()
    {
        return $this->hasOne('App\Major', 'id', 'major');
    }

    /**
     * Get the Teacher for the Class.
     */
    public function Teacher()
    {
        return $this->hasOne('App\Teacher', 'id', 'teacher');
    }
}
