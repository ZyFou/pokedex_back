<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonEvolution extends Model
{
    use HasFactory;

    protected $fillable = [
        'pokemon_variety_id',
        'evolves_to_id',
        'gender',
        'held_item_id',
        'item_id',
        'known_move_id',
        'known_move_type_id',
        'location',
        'min_affection',
        'min_happiness',
        'min_level',
        'need_overworld_rain',
        'party_species_id',
        'party_type_id',
        'relative_physical_stats',
        'time_of_day',
        'trade_species_id',
        'turn_upside_down',
        'evolution_trigger_id',
    ];

    protected $casts = [
        'gender' => 'boolean',
        'need_overworld_rain' => 'boolean',
        'turn_upside_down' => 'boolean',
    ];

    public function pokemonVariety()
    {
        return $this->belongsTo(PokemonVariety::class, 'pokemon_variety_id');
    }

    public function evolvesTo()
    {
        return $this->belongsTo(PokemonVariety::class, 'evolves_to_id');
    }

    public function heldItem()
    {
        return $this->belongsTo(Item::class, 'held_item_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function knowMove()
    {
        return $this->belongsTo(Move::class, 'known_move_id');
    }

    public function knowMoveType()
    {
        return $this->belongsTo(Type::class, 'known_move_type_id');
    }

    public function partySpecies()
    {
        return $this->belongsTo(Pokemon::class, 'party_species_id');
    }

    public function partyType()
    {
        return $this->belongsTo(Type::class, 'party_type_id');
    }

    public function tradeSpecies()
    {
        return $this->belongsTo(Pokemon::class, 'trade_species_id');
    }

    public function evolutionTrigger()
    {
        return $this->belongsTo(EvolutionTrigger::class, 'evolution_trigger_id');
    }
}
