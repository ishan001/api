<?php

namespace App\Api\v1\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryLevelOne extends Model
{
    /**
     * The Level Two Categories that belong to the Level One Categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function levelTwos()
    {
        return $this->hasMany('App\Api\v1\Models\CategoryLevelTwo');
    }
}
