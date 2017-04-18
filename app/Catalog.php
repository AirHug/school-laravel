<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    /**
     * Get the Articles for the Catalog.
     */
    public function articles()
    {
        return $this->hasMany('App\Article', 'pid', 'id');
    }

    /**
     * Get the Article for the Catalog.
     */
    public function article()
    {
        return $this->hasOne('App\Article', 'id', 'article_id');
    }

    /**
     * Get the subCatalogs for the Catalog.
     */
    public function parentCatalog()
    {
        return $this->belongsTo('App\Catalog', 'pid', 'id');
    }

    /**
     * Get the subCatalogs for the Catalog.
     */
    public function subCatalog()
    {
        return $this->hasMany('App\Catalog', 'pid', 'id');
    }

    /**
     * Get real url of Catalog.
     */
    public function getCatalogUrl()
    {
        if ($this->url != "") {
            return $this->url;
        } else if ($this->article_id != 0) {
            return url("A", $this->article_id);
        } else {
            return url("L", $this->id);
        }
    }
}
