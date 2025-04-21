<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = [
        'name',
        'type',
        'location',
        'date',
        'official_url',
        'notes',
    ];
}
