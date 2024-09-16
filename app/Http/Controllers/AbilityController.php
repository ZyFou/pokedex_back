<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbilityController extends Controller
{
    /**
     * Affiche une liste de tous les types de Pokémon.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Récupère tous les types avec leurs IDs et sprite_url
        $abilities = Ability::select()->get();

        return response()->json($abilities);
    }

    public function infos($AbilityId)
    {
        $ability = Ability::find($AbilityId);

        if (!$ability) {
            return response()->json(['error' => 'Type not found'], 404);
        }

        $moveName = DB::table('ability_translations')
            ->where('ability_id', $AbilityId)
            ->get();


        return response()->json([
            'name' => $moveName,
            'ability_id' => $AbilityId,
        ]);
    }
}
