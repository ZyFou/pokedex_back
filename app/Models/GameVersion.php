<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameVersion extends Model
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['name'];

    protected $fillable = [
        'generic_name',
        'generation',
    ];

    public function translations()
    {
        return $this->hasMany(GameVersionTranslation::class);
    }
}
