<?php

namespace App\Api\v1\Models;

use Illuminate\Database\Eloquent\Model;

class MakeModel extends Model
{
    protected $fillable = ['make'];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Make()
    {
        return $this->belongsTo('App\Api\v1\Models\Make');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Car()
    {
        return $this->belongsTo('App\Api\v1\Models\Car');
    }
}
