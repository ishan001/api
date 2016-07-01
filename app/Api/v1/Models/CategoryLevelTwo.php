<?php

namespace App\Api\v1\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryLevelTwo extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function levelOne()
    {
        return $this->belongsTo('App\Api\v1\Models\CategoryLevelOne');
    }
    
    /**
     * The Level Three Categories that have Level Two Categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function levelThrees()
    {
        return $this->hasMany('App\Api\v1\Models\CategoryLevelThree');
    }
}
