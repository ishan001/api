<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryLevelThree extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function levelTwo()
    {
        return $this->belongsTo('App\CategoryLevelTwo');
    }
}
