<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Releases extends Model
{
    protected $fillable = [
        'fumo_id',
        'release_date',
        'release_type',
        'country',
        'seller',
        'price_jpy',
        'price_usd',
        'event_id',
        'notes',
    ];

    public function fumo()
    {
        return $this->belongsTo(Fumo::class, 'fumo_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
