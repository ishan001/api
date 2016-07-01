<?php

namespace App\Api\v1\Models;

use Illuminate\Database\Eloquent\Model;

class CarMake extends Model
{
    /**
     * Car Make has many car model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function CarModels()
    {
        return $this->hasMany('App\Api\v1\Models\CarModel');
    }
}
