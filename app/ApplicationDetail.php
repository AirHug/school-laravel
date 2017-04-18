<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationDetail extends Model
{

    /**
     * The catalog that belong to the article.
     */
    public function Asset()
    {
        return $this->belongsTo('App\Asset');
    }
}
