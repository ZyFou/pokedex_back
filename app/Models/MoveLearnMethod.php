<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoveLearnMethod extends Model
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['name', 'description'];

    protected $fillable = [
        // Ajoute ici les attributs qui peuvent être assignés en masse si nécessaire
    ];

    public function translations()
    {
        return $this->hasMany(MoveLearnMethodTranslation::class);
    }
}
