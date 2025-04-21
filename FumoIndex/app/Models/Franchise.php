<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    use HasFactory;
    
    protected $fillable = ['franchise_name', 'franchise_image', 'slug_name'];

    public function characters()
    {
        return $this->hasMany(Character::class);
    }
}
