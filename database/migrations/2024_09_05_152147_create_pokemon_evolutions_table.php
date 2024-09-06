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
            $table->bigInteger('pokemon_variety_id');
            $table->bigInteger('evolves_to_id');
            $table->boolean('gender')->nullable();
            $table->bigInteger('held_item_id')->nullable();
            $table->bigInteger('item_id')->nullable();
            $table->bigInteger('know_move_id')->nullable();
            $table->bigInteger('know_move_type_id')->nullable();
            $table->string('location')->nullable();
            $table->integer('min_affection')->nullable();
            $table->integer('min_happiness')->nullable();
            $table->integer('min_level')->nullable();
            $table->boolean('need_overworld_rain');
            $table->bigInteger('party_species_id')->nullable();
            $table->bigInteger('party_type_id')->nullable();
            $table->integer('relative_physical_stats');
            $table->string('time_of_day')->nullable();
            $table->bigInteger('trade_species_id')->nullable();
            $table->boolean('turn_upside_down')->default(false);
            $table->bigInteger('evolution_trigger_id');
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
