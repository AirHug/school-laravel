<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    /**
     * The Teacher that belong to the Application.
     */
    public function Creator()
    {
        return $this->belongsTo('App\Teacher', "creator", "id");
    }

    /**
     * The Details of the Application.
     */
    public function Details()
    {
        return $this->hasMany('App\ApplicationDetail', "application_id", "id");
    }

    /**
     * Purchase
     */
    public function purchase()
    {
        foreach ($this->Details as $detail) {
            $asset = $detail->Asset;
            $asset->count = $asset->count + $detail->count;
            $asset->save();
        }
    }

    /**
     * Determining the available count can satisfied the application;
     */
    public function isSatisfied()
    {
        $flag = true;
        if ($this->type != "采购") {
            foreach ($this->Details as $detail) {
                $asset = $detail->Asset;
                if ((((int)$asset->getAvailableCount()[0]->count) > $detail->count)) {
                    $flag = false;
                }
            }
        }
        return $flag;
    }
}
