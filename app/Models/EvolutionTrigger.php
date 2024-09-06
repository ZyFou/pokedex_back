<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvolutionTrigger extends Model
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['name'];

    protected $fillable = [
        'slug',
    ];

    public function translations()
    {
        return $this->hasMany(EvolutionTriggerTranslation::class);
    }
}
