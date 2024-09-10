<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\PokemonVariety;

use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index()
    {
        return Pokemon::with(['defaultVariety', 'defaultVariety.sprites'])
            ->paginate(20);
    }

    public function show(Pokemon $pokemon)
    {
        return $pokemon->load(['defaultVariety', 'defaultVariety.sprites', 'defaultVariety.types']);
    }

    public function showVarieties(Pokemon $pokemon)
    {
        return $pokemon->varieties()->with(['sprites', 'types'])->get();
    }

    public function stats(Pokemon $pokemon)
    {
        $stats = $pokemon->defaultVariety()
            ->select([
                'base_stat_hp',
                'base_stat_attack',
                'base_stat_defense',
                'base_stat_special_attack',
                'base_stat_special_defense',
                'base_stat_speed'
            ])
            ->first();

        if ($stats) {
            return response()->json($stats);
        }

        return response()->json(['message' => 'No stats available for this Pokémon'], 404);
    }

    // public function showMoves(PokemonVariety $pokemonVariety)
    // {
    //     $moves = $pokemonVariety->learnMoves()->with(['type', 'damageClass'])->get();

    //     return response()->json([
    //         'moves' => $moves
    //     ]);
    // }

    // public function showEvolutions(PokemonVariety $pokemonVariety)
    // {
    //     // Récupère les évolutions depuis la table pokemon_evolutions
    //     $evolutions = $pokemonVariety->evolutions()->with([
    //         'toVariety',
    //         'item',
    //         'move',
    //         'moveType',
    //         'evolutionTrigger'
    //     ])->get();

    //     return response()->json([
    //         'evolutions' => $evolutions
    //     ]);
    // }
}
