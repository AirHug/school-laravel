<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    /**
     * The catalog that belong to the article.
     */
    public function Catalog()
    {
        return $this->belongsTo('App\Catalog', "catalog", "id");
    }
}
