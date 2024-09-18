<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\PokemonVariety;
use App\Models\PokemonLearnMove;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index()
    {
        return Pokemon::with(['defaultVariety', 'defaultVariety.sprites', 'defaultVariety.types'])
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

    public function Moves(Pokemon $pokemon)
    {
        // Trouver le type par son ID
        $moves = PokemonLearnMove::find($pokemon);

        if (!$moves) {
            return response()->json(['error' => 'Type not found'], 404);
        }

        $moves = DB::table('pokemon_learn_moves')
            ->where('pokemon_variety_id', $pokemon['id'])
            // ->where('game_version_id', 8)
            ->get();

        return response()->json([
            'informations' => $pokemon,
            'moves' => $moves
        ]);
    }
}
