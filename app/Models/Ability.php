<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['name', 'description', 'effect'];

    protected $fillable = [
        // Ajoute ici les attributs spécifiques à Ability si nécessaire
    ];

    public function translations()
    {
        return $this->hasMany(AbilityTranslation::class);
    }
}
