<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FumoImage extends Model
{
    protected $fillable = [
        'fumo_id',
        'image_url',
    ];

    public function fumo()
    {
        return $this->belongsTo(Fumo::class);
    }
}
