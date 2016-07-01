<?php

namespace App\Api\v1\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function CarMake()
    {
        return $this->belongsTo('App\Api\v1\Models\CarMake');
    }
}
