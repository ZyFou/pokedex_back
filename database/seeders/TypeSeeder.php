<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['id' => 1, 'color' => '#919AA2', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_normal.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_normal.svg'],  // Normal
            ['id' => 2, 'color' => '#CE416B', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_combat.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_combat.svg'],  // Combat
            ['id' => 3, 'color' => '#89AAE3', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_fly.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_fly.svg'], // Vol
            ['id' => 4, 'color' => '#C699E5', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_poison.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_poison.svg'], // Poison
            ['id' => 5, 'color' => '#DB9E6E', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_ground.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_ground.svg'], // Sol
            ['id' => 6, 'color' => '#C5B78C', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_rock.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_rock.svg'], // Roche
            ['id' => 7, 'color' => '#95BD43', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_bug.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_dark.svg'], // Insect
            ['id' => 8, 'color' => '#5269AD', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_ghost.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_ghost.svg'], // Spectre
            ['id' => 9, 'color' => '#5A8EA2', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_steel.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_steel.svg'], // Acier
            ['id' => 10, 'color' => '#FF9D55', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_fire.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_fire.svg'], // Feu
            ['id' => 11, 'color' => '#71B1FF', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_water.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_water.svg'], // Eau
            ['id' => 12, 'color' => '#9CDB8D', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_plant.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_plant.svg'], // Plante 
            ['id' => 13, 'color' => '#F4D23C', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_electrik.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_electrik.svg'], // Electrik
            ['id' => 14, 'color' => '#D76088', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_psy.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_psy.svg'], // Psy
            ['id' => 15, 'color' => '#73CEC0', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_ice.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_ice.svg'], // Glace
            ['id' => 16, 'color' => '#0B6DC3', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_dragon.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_dragon.svg'], // Dragon
            ['id' => 17, 'color' => '#7B6C8F', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_dark.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_dark.svg'], // Tenebres
            ['id' => 18, 'color' => '#FFA3E5', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_fairy.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_fairy.svg'], // Fée
            ['id' => 19, 'color' => '#DDD7FA', 'icon' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/light_type_badge/icon_stellar.svg', 'icon_dark' => 'https://raw.githubusercontent.com/ZyFou/pokedex_front/master/public/assets/svg/dark_type_badge/dark_icon_stellar.svg'], // Stellar
        ];

        foreach ($types as $type) {
            Type::where('id', $type['id'])->update([
                'color' => $type['color'],
                'icon' => $type['icon'],
                'icon_dark' => $type['icon_dark'],
            ]);
        }
    }
}
