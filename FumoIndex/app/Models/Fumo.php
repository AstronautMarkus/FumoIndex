<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fumo extends Model
{
    use HasFactory;

    protected $fillable = [
        'gift_code',
        'version',
        'fumo_name',
        'official_url',
        'notes',
        'character_id',
        'type_id'
    ];

    public function character()
    {
        return $this->belongsToMany(Character::class, 'fumo_character', 'fumo_id', 'character_id');
    }

    public function type()
    {
        return $this->belongsTo(FumoType::class, 'type_id');
    }




}

