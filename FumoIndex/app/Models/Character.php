<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;
    
    protected $fillable = ['character_name', 'slug_name', 'character_image', 'franchise_id', 'character_description', 'description_source'];

    public function franchise()
    {
        return $this->belongsTo(Franchise::class);
    }

    public function fumos()
    {
        return $this->belongsToMany(Fumo::class, 'fumo_character');
    }

    
}
