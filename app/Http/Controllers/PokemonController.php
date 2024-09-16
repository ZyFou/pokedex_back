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

        return response()->json([
            'pokemon' => $pokemon->name,
            'stats' => $stats
        ]);
    }


    public function evolutions(Pokemon $pokemon)
    {
        // Charger les évolutions possibles depuis ce Pokémon
        $evolutions = $pokemon->evolutions()->with([
            'evolvesTo.translations',
            'heldItem.translations',
            'item.translations',
            'knowMove.translations',
            'knowMoveType.translations',
            'partySpecies.translations',
            'partyType.translations',
            'tradeSpecies.translations',
            'evolutionTrigger.translations'
        ])->get();


        if ($evolutions->isEmpty()) {
            return response()->json(
                [
                    'pokemon' => $pokemon->name,
                    'evolutions' => [], // Retourne un tableau vide pour les évolutions
                    'message' => 'Aucune évolution trouvée'
                ]
            );
        } else {
            return response()->json([
                'pokemon' => $pokemon->name,
                'evolutions' => $evolutions
            ]);
        }
    }
}
