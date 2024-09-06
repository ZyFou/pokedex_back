<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pokemon_evolutions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\PokemonVariety::class, 'pokemon_variety_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(App\Models\PokemonVariety::class, 'evolves_to_id')->constrained('pokemon_varieties')->onDelete('cascade');
            $table->boolean('gender')->nullable();
            $table->foreignIdFor(App\Models\Item::class, 'held_item_id')->nullable();
            $table->foreignIdFor(App\Models\Item::class, 'item_id')->nullable();
            $table->foreignIdFor(App\Models\Move::class, 'know_move_id')->nullable();
            $table->foreignIdFor(App\Models\Type::class, 'know_move_type_id')->nullable();
            $table->string('location')->nullable();
            $table->integer('min_affection')->nullable();
            $table->integer('min_happiness')->nullable();
            $table->integer('min_level')->nullable();
            $table->boolean('need_overworld_rain');
            $table->foreignIdFor(App\Models\Pokemon::class, 'party_species_id')->nullable();
            $table->foreignIdFor(App\Models\Type::class, 'party_type_id')->nullable();
            $table->integer('relative_physical_stats');
            $table->string('time_of_day')->nullable();
            $table->foreignIdFor(App\Models\Pokemon::class, 'trade_species_id')->nullable();
            $table->boolean('turn_upside_down')->default(false);
            $table->foreignIdFor(App\Models\EvolutionTrigger::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_evolutions');
    }
};
