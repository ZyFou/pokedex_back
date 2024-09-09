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
            $table->foreignIdFor(App\Models\Type::class, 'from_type_id')->constrained('types')->onDelete('cascade');
            $table->foreignIdFor(App\Models\Type::class, 'to_type_id')->constrained('types')->onDelete('cascade');
            $table->foreignIdFor(App\Models\TypeInteractionState::class)->constrained('type_interaction_states')->onDelete('cascade');
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
