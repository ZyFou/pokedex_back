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
            $table->bigInteger('pokemon_variety_id')->constrained('pokemon_varieties');
            $table->bigInteger('evolves_to_id')->constrained('pokemon_varieties');
            $table->boolean('gender')->nullable();
            $table->bigInteger('held_item_id')->nullable()->constrained('items');
            $table->bigInteger('item_id')->nullable()->constrained('items');
            $table->bigInteger('know_move_id')->nullable()->constrained('moves');
            $table->bigInteger('know_move_type_id')->nullable()->constrained('types');
            $table->string('location')->nullable();
            $table->integer('min_affection')->nullable();
            $table->integer('min_happiness')->nullable();
            $table->integer('min_level')->nullable();
            $table->boolean('need_overworld_rain')->default(false);
            $table->bigInteger('party_species_id')->nullable()->constrained('pokemons');
            $table->bigInteger('party_type_id')->nullable()->constrained('types');
            $table->integer('relative_physical_stats')->nullable();
            $table->string('time_of_day')->nullable();
            $table->bigInteger('trade_species_id')->nullable()->constrained('pokemons');
            $table->boolean('turn_upside_down')->default(false);
            $table->bigInteger('evolution_trigger_id')->constrained('evolution_triggers');
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
