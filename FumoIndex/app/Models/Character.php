<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;
    
    protected $fillable = ['character_name', 'character_image', 'franchise_id'];

    public function franchise()
    {
        return $this->belongsTo(Franchise::class);
    }

    public function fumos()
    {
        return $this->hasMany(Fumo::class);
    }
}
