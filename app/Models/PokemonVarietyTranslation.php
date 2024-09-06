<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonVarietyTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'pokemon_variety_id',
        'locale',
        'name',
        'form_name',
        'description'
    ];

    protected $casts = [
        'pokemon_variety_id' => 'integer',
    ];

    public function pokemonVariety()
    {
        return $this->belongsTo(PokemonVariety::class);
    }
}
