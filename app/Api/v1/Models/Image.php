<?php

namespace App\Api\v1\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['is_active',
        'is_featured',
        'image_name',
        'image_path',
        'image_extension'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Car()
    {
        return $this->belongsTo('App\Api\v1\Models\Car');
    }
}
