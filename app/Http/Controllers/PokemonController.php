<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\PokemonVariety;
use App\Models\PokemonLearnMove;
use App\Models\PokemonEvolution;
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
                    'evolutions' => [],
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

    public function chain(Pokemon $pokemon)
    {
        // Trouver la base de l'évolution pour le Pokémon donné
        $currentVarietyId = $pokemon->defaultVariety->id;

        // Trouver la base de la chaîne évolutive
        do {
            // Trouver la relation d'évolution où ce Pokémon est la forme évoluée
            $evolution = PokemonEvolution::where('evolves_to_id', $currentVarietyId)->first();

            // Si une évolution a été trouvée, on remonte vers le parent (la base potentielle)
            if ($evolution) {
                $currentVarietyId = $evolution->pokemon_variety_id;
            }
        } while ($evolution);

        // Récupérer le Pokémon correspondant à la base
        $baseVariety = PokemonVariety::with('pokemon')->find($currentVarietyId);

        if (!$baseVariety) {
            return response()->json(['error' => 'Base not found'], 404);
        }

        // Collection pour stocker toute la chaîne évolutive
        $evolutionChain = [];
        $currentVarietyId = $baseVariety->id;

        // Ajouter la base à la chaîne
        $evolutionChain[] = $baseVariety;

        // Parcourir toute la chaîne évolutive en commençant par la base
        do {
            // Trouver toutes les évolutions depuis ce Pokémon
            $evolutions = PokemonEvolution::with([
                'evolvesTo.pokemon',
                'evolutionTrigger.translations' // Charger les détails du trigger d'évolution
            ])
                ->where('pokemon_variety_id', $currentVarietyId)
                ->get();

            if ($evolutions->isNotEmpty()) {
                foreach ($evolutions as $evolution) {
                    // Ajouter chaque forme évoluée à la chaîne avec les détails du trigger
                    $evolutionChain[] = [
                        'variety' => $evolution->evolvesTo,
                        'evolution_trigger' => $evolution->evolutionTrigger->name ?? null,
                        'additional_conditions' => [
                            'held_item' => $evolution->heldItem->name ?? null,
                            'min_level' => $evolution->min_level ?? null,
                            'known_move' => $evolution->knowMove->name ?? null,
                            'time_of_day' => $evolution->time_of_day ?? null,
                            'trade_species' => $evolution->tradeSpecies->name ?? null,
                            // Ajouter d'autres conditions d'évolution ici si nécessaire
                        ]
                    ];
                }

                // Mettre à jour l'ID actuel pour continuer avec les prochains
                $currentVarietyId = $evolutions->first()->evolves_to_id;
            } else {
                // Arrêter s'il n'y a plus d'évolution
                $currentVarietyId = null;
            }
        } while ($currentVarietyId);

        // Renvoyer les informations de la chaîne évolutive
        return response()->json([
            'base_pokemon' => $baseVariety->pokemon->name,
            'current_pokemon' => $pokemon->name,

            'evolution_chain' => $evolutionChain
        ]);
    }


    public function Moves(Pokemon $pokemon)
    {
        // Trouver le type par son ID
        $moves = PokemonLearnMove::find($pokemon);

        if (!$moves) {
            return response()->json(['error' => 'Moves not found'], 404);
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
