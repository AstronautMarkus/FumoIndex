<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FumoType extends Model
{
    use HasFactory;
    
    protected $fillable = ['fumo_type'];

    public function fumos()
    {
        return $this->hasMany(Fumo::class);
    }
}
