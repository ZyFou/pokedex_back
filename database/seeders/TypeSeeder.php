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
            ['id' => 1, 'color' => '#919AA2', 'icon' => '', 'icon_dark' => ''],  // Normal
            ['id' => 2, 'color' => '#CE416B', 'icon' => '', 'icon_dark' => ''],  // Combat
            ['id' => 3, 'color' => '#89AAE3', 'icon' => '', 'icon_dark' => ''], // Vol
            ['id' => 4, 'color' => '#C699E5', 'icon' => '', 'icon_dark' => ''], // Poison
            ['id' => 5, 'color' => '#DB9E6E', 'icon' => '', 'icon_dark' => ''], // Sol
            ['id' => 6, 'color' => '#C5B78C', 'icon' => '', 'icon_dark' => ''], // Roche
            ['id' => 7, 'color' => '#95BD43', 'icon' => '', 'icon_dark' => ''], // Insect
            ['id' => 8, 'color' => '#5269AD', 'icon' => '', 'icon_dark' => ''], // Spectre
            ['id' => 9, 'color' => '#5A8EA2', 'icon' => '', 'icon_dark' => ''], // Acier
            ['id' => 10, 'color' => '#FF9D55', 'icon' => '', 'icon_dark' => ''], // Feu
            ['id' => 11, 'color' => '#71B1FF', 'icon' => '', 'icon_dark' => ''], // Eau
            ['id' => 12, 'color' => '#9CDB8D', 'icon' => '', 'icon_dark' => ''], // Plante 
            ['id' => 13, 'color' => '#F4D23C', 'icon' => '', 'icon_dark' => ''], // Electrik
            ['id' => 14, 'color' => '#D76088', 'icon' => '', 'icon_dark' => ''], // Psy
            ['id' => 15, 'color' => '#73CEC0', 'icon' => '', 'icon_dark' => ''], // Glace
            ['id' => 16, 'color' => '#0B6DC3', 'icon' => '', 'icon_dark' => ''], // Dragon
            ['id' => 17, 'color' => '#7B6C8F', 'icon' => '', 'icon_dark' => ''], // Tenebres
            ['id' => 18, 'color' => '#FFA3E5', 'icon' => '', 'icon_dark' => ''], // Fée
            ['id' => 19, 'color' => '#DDD7FA', 'icon' => '', 'icon_dark' => ''], // Stellar
        ];

        foreach ($types as $type) {
            Type::where('id', $type['id'])->update([
                'color' => $type['color'],
                'icon' => $type['icon'],
            ]);
        }
    }
}
