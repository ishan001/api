<?php

namespace App\Api\v1\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['make_id',
        'model_id',
        'model_details',
        'year',
        'odometer',
        'exterior_colour',
        'interior_colour',
        'cylinders',
        'engine_size',
        'owners',
        'import_history',
        'registration_expire',
        'wof_expire',
        'number_plate',
        'post_code',
        'suburb',
        'description',
    ];

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

    /**
     * Car images
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Images()
    {
        return $this->hasMany('App\Api\v1\Models\Image');
    }
}
