<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pokemon_variety_type', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(App\Models\PokemonVariety::class)->constrained()->onDelete('cascade');

            $table->integer('slot');

            $table->foreignIdFor(App\Models\Type::class)->constrained()->onDelete('cascade');

            $table->unique(['pokemon_variety_id', 'type_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_variety_type');
    }
};
