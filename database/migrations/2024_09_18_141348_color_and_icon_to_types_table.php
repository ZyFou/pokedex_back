<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('types', function (Blueprint $table) {
            $table->string('color')->nullable();
            $table->string('icon')->nullable();
            $table->string('icon_dark')->nullable(); // Ajout de icon_dark
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('types', function (Blueprint $table) {
            $table->dropColumn('color');
            $table->dropColumn('icon');
            $table->dropColumn('icon_dark');
        });
    }
};
