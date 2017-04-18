<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leaveNote extends Model
{
    /**
     * Get the Teacher for the leaveNote.
     */
    public function Teacher()
    {
        return $this->belongsTo('App\Teacher', 'personId', 'id');
    }

    /**
     * Get the Student for the leaveNote.
     */
    public function Student()
    {
        return $this->belongsTo('App\Student', 'personId', 'id');
    }
}
