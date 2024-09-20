<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\TypeInteraction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    /**
     * Affiche une liste de tous les types de Pokémon.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Récupère tous les types avec leurs IDs et sprite_url
        $types = Type::select('id', 'sprite_url', 'color', 'icon', 'icon_dark')->get();

        return response()->json($types);
    }

    /**
     * Affiche les faiblesses d'un type spécifique par son ID.
     *
     * @param  int  $typeId
     * @return \Illuminate\Http\JsonResponse
     */

    public function infos($typeId)
    {
        // Trouver le type par son ID
        $type = Type::find($typeId);

        if (!$type) {
            return response()->json(['error' => 'Type not found'], 404);
        }

        // Obtenir les faiblesses de ce type (celles où multiplier > 1)
        $infos = DB::table('types')
            ->where('id', '=', $typeId)
            ->get();

        $name = DB::table('type_translations')
            ->where('type_id', '=', $typeId)
            ->get();

        return response()->json([
            'name' => $name,
            'type_id' => $typeId,
            'infos' => $infos
        ]);
    }

    public function weaknesses($typeId)
    {
        // Trouver le type par son ID
        $type = Type::find($typeId);

        if (!$type) {
            return response()->json(['error' => 'Type not found'], 404);
        }

        // Obtenir les faiblesses de ce type (celles où multiplier > 1)
        $weakness = TypeInteraction::where(
            'to_type_id',
            $typeId
        )->where('type_interaction_state_id', '=', 4)->get();

        return response()->json([
            'type_id' => $typeId,
            'weaknesses' => $weakness
        ]);
    }

    public function resistance($typeId)
    {
        // Trouver le type par son ID
        $type = Type::find($typeId);

        if (!$type) {
            return response()->json(['error' => 'Type not found'], 404);
        }

        // Obtenir les faiblesses de ce type (celles où multiplier > 1)
        $weakness = TypeInteraction::where(
            'to_type_id',
            $typeId
        )->where('type_interaction_state_id', '=', 2)->get();

        return response()->json([
            'type_id' => $typeId,
            'resistance' => $weakness
        ]);
    }
}
