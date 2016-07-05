<?php

namespace App\Api\v1\Models;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    /**
     * Car Make has many car model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Models()
    {
        return $this->hasMany('App\Api\v1\Models\Model');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Car()
    {
        return $this->belongsTo('App\Api\v1\Models\Car');
    }
}
