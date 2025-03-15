<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fumo extends Model
{
    use HasFactory;
    
    protected $fillable = ['fumo_name', 'character_id', 'type_id'];

    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    public function fumoType()
    {
        return $this->belongsTo(FumoType::class, 'type_id');
    }
}

