<?php

namespace App\Api\v1\Models;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    protected $fillable = ['make'];
    /**
     * Car Make has many car model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function MakeModels()
    {
        return $this->hasMany('App\Api\v1\Models\MakeModel');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Car()
    {
        return $this->belongsTo('App\Api\v1\Models\Car');
    }
}
