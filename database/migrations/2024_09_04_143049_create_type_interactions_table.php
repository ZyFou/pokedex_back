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
        Schema::create('type_interactions', function (Blueprint $table) {
            $table->id();
            $table->bigIncrements('from_type_id');
            $table->bigIncrements('tp_type_id');
            $table->bigIncrements('type_interaction_state_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_interactions');
    }
};
