<?php

namespace App\Api\v1\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     * Car make
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Make()
    {
        return $this->hasOne('App\Api\v1\Models\Model');
    }

    /**
     * Car model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Model()
    {
        return $this->hasOne('App\Api\v1\Models\Model');
    }

    /**
     * Features belongs to Car
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Features()
    {
        return $this->belongsToMany('App\Api\v1\Models\Features');
    }

    /**
     * Car Body Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function BodyType()
    {
        return $this->hasOne('App\Api\v1\Models\BodyType');
    }

    /**
     * Car Transmission
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Transmission()
    {
        return $this->hasOne('App\Api\v1\Models\Transmission');
    }

    /**
     * Car Fuel Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function FuelType()
    {
        return $this->hasOne('App\Api\v1\Models\FuelType');
    }
}
