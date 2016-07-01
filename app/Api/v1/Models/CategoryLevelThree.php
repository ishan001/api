<?php

namespace App\Api\v1\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryLevelThree extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function levelTwo()
    {
        return $this->belongsTo('App\Api\v1\Models\CategoryLevelTwo');
    }
}
