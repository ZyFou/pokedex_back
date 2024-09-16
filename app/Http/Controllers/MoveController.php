<?php

namespace App\Http\Controllers;

use App\Models\Move;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MoveController extends Controller
{
    /**
     * Affiche une liste de tous les types de Pokémon.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Récupère tous les types avec leurs IDs et sprite_url
        $moves = Move::select()->get();

        return response()->json($moves);
    }

    public function infos($MoveId)
    {
        $move = Move::find($MoveId);

        if (!$move) {
            return response()->json(['error' => 'Type not found'], 404);
        }

        // Obtenir les faiblesses de ce type (celles où multiplier > 1)
        $infos = DB::table('moves')
            ->where('id', $MoveId)
            ->get();

        $moveName = DB::table('move_translations')
            ->where('move_id', $MoveId)
            ->get();


        return response()->json([
            'name' => $moveName,
            'move_id' => $MoveId,
            'infos' => $infos,
        ]);
    }
}
