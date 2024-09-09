<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Type extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['name'];

    protected $fillable = [
        'sprite_url'
    ];

    public function interactionsFrom()
    {
        return $this->hasMany(TypeInteraction::class, 'from_type_id');
    }

    public function interactionsTo()
    {
        return $this->hasMany(TypeInteraction::class, 'to_type_id');
    }
}
