<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Pokemon extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['name', 'category'];

    protected $fillable = [
        'has_gender_differences',
        'is_baby',
        'is_legendary',
        'is_mythical'
    ];

    protected $casts = [
        'has_gender_differences' => 'boolean',
        'is_baby' => 'boolean',
        'is_legendary' => 'boolean',
        'is_mythical' => 'boolean',
    ];

    public function varieties()
    {
        return $this->hasMany(PokemonVariety::class);
    }

    public function defaultVariety()
    {
        return $this->hasOne(PokemonVariety::class)
            ->where('is_default', true);
    }

    public function catchByUsers()
    {
        return $this->belongsToMany(User::class);
    }

    public function evolutions()
    {
        return $this->hasManyThrough(
            PokemonEvolution::class,
            PokemonVariety::class,
            'pokemon_id',
            'pokemon_variety_id',
            'id',
            'id'
        );
    }

    public function generation()
    {
        return $this->belongsTo(GameVersion::class);
    }
}
