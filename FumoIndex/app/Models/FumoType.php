<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FumoType extends Model
{
    use HasFactory;
    
    protected $fillable = ['fumo_type', 'type_description', 'type_image', 'is_primary'];
    
    protected $attributes = [
        'is_primary' => true,
    ];

    public function fumos()
    {
        return $this->hasMany(Fumo::class);
    }
}
