<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryLevelTwo extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function levelOne()
    {
        return $this->belongsTo('App\CategoryLevelOne');
    }
    
    /**
     * The Level Three Categories that have Level Two Categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function levelThrees()
    {
        return $this->hasMany('App\CategoryLevelThree');
    }
}
