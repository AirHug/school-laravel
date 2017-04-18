<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Asset extends Model
{

    /**
     * The available count of the asset item.
     */
    public function getAvailableCount()
    {
        $availableCount = DB::select("select sum(application_details.count) as count from applications,application_details,assets
where applications.`status`=1
and applications.isExecuted=0
and application_details.application_id=applications.id
and application_details.asset_id=assets.id
and assets.id=:id
and applications.type!=:type", ['id' => $this->id, 'type' => "采购"]);
        return $availableCount;
    }
}
